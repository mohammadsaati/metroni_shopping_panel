<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\Feature\CreateFeatureRequest;
use App\Http\Requests\Product\Feature\UpdateFeatureRequest;
use App\Models\Feature;
use App\Models\Product;
use App\Services\FeatureProductService;
use Illuminate\Http\Request;

class FeatureProductController extends Controller
{
    private $view_folder = "admin.product.detail.feature." ;

    public function __construct(public FeatureProductService $service)
    {
    }

    public function index(Product $product)
    {
        $data["title"] = "ویژگی مجصول";
        $data["product_features"] = $product->features()->orderBy("id" , "DESC")->get();
        $data["features"] = Feature::all();
        $data["product"] = $product;

        return view($this->view_folder."index" , compact("data"));
    }

    public function store(CreateFeatureRequest $request , Product $product)
    {
        $this->service->createFeature(data: $request->toArray() , product: $product);

        return redirect()->route("product.feature.index" , $product->slug);
    }

    public function update(UpdateFeatureRequest $request , Product $product , Feature $feature)
    {
        $this->service->updatePivot(data: $request->all() , product: $product , feature: $feature);

        return redirect()->route("product.feature.index" , $product->slug);
    }

    public function delete(Product $product , Feature $feature)
    {
        $this->service->deleteFeature($product , $feature);

        return response_as_json("success");
    }

}
