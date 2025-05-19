<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Size;
use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    private $view_folder = "admin.product.";

    public function __construct(public ProductService $service)
    {
    }

    public function index(ProductFilter $filter)
    {
        $data["title"] = "محصولات";
        $data["products"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }


    public function create()
    {
        $data = $this->prepareShowOrCreate();
        $data["title"] = "محصول جدید";

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateProductRequest $request)
    {
        $this->service->createProduct($request->toArray());

        return redirect()->route("product.index");
    }

    public function show(Product $product)
    {
        $data = $this->prepareShowOrCreate();
        $data["title"] = $product->name;
        $data["product"] = $product;

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdateProductRequest $request , Product $product)
    {
        if (\request()->ajax())
        {
            $this->service->updates(data: $request->toArray() , item: $product);

            return response_as_json(data: "success");
        }
        $this->service->updateProduct(data: $request->toArray() , product: $product);

        return redirect()->route("product.index");
    }

    private function prepareShowOrCreate() : array
    {
        addVendors(["tinymce" , "jalali-date-picker" , "formrepeater"]);

        $data["sizes"]  =   Size::all();
        $data["features"] = Feature::GetActive()->get();

        return $data;
    }

}
