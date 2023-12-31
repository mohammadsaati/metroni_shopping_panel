<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\Shipping\CreateShippingRequest;
use App\Http\Requests\Product\Shipping\UpdateShippingRequest;
use App\Models\City;
use App\Models\Item;
use App\Models\Product;
use App\Models\ShippingPrice;
use App\Services\ShippingPriceService;
use Illuminate\Http\Request;

class ShippingPriceController extends Controller
{
    private $view_folder = "admin.product.detail.shippingPrice." ;
    public function __construct(public ShippingPriceService $service)
    {
    }

    public function index(Product $product)
    {
        $data["title"] = "هزینه های ارسال";
        $data["shipping_prices"] = $product->shippingPrice()->orderBy("id" , "DESC")->get();
        $data["cities"] = City::all();
        $data["product"] = $product;

        return view($this->view_folder."index" , compact("data"));
    }

    public function store(CreateShippingRequest $request , Product $product)
    {
        $this->service->create($request->toArray());

        return redirect()->route("product.shipping_price.index" , $product->slug);
    }

    public function update(UpdateShippingRequest $request ,Product $product ,  ShippingPrice $shipping_price)
    {
        $this->service->updateShipping(data: $request->toArray() , shipping_price: $shipping_price);

        return redirect()->route("product.shipping_price.index" , $product->slug);
    }

    public function delete(Product $product , Item $item , ShippingPrice $shipping_price)
    {
        $this->service->deleteShipping($shipping_price);

        return response_as_json("success");
    }


}
