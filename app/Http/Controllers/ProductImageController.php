<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\Image\CreateImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\ProductImageService;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    private $view_folder = "admin.product.detail.image.";
    public function __construct(public ProductImageService $service)
    {
    }


    public function index(Product $product)
    {
        $data["title"] = "گالری محصول";
        $data["images"] = $product->images()->orderBy("id" , "DESC")->get();
        $data["product"] = $product;

        return view($this->view_folder."index" , compact("data"));
    }

    public function store(CreateImageRequest $request , Product $product)
    {
        $this->service->createImage($request->toArray());

        return redirect()->route("product.image.index" , $product->slug);
    }

    public function delete(Product $product , ProductImage $image)
    {
        $this->service->deleteImage($image);

        return response_as_json("success");
    }
}
