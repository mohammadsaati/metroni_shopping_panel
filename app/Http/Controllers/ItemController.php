<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Product\Item\CreateItemRequest;
use App\Http\Requests\Product\Item\UpdateItemRequest;
use App\Models\Item;
use App\Models\Product;
use App\Models\Size;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $view_folder = "admin.product.detail.item.";
    public function __construct(public ItemService $service)
    {
    }

    public function index(PublicFilter $filter , Product $product)
    {
        $data["title"] = "لیست قیمت ها";
        $data["items"] = $this->service->showAll($filter);
        $data["product"] = $product;
        $data["sizes"] = Size::all();

        return view($this->view_folder."index" , compact("data"));
    }

    public function create(Product $product)
    {
        addVendors(["jalali-date-picker"]);

        $data["title"] = "اضافه کردن لیست قیمیت";
        $data["sizes"] = Size::all();
        $data["product"] = $product;

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateItemRequest $request , Product $product)
    {
        ItemService::createItem(data: $request->toArray());

        return redirect()->route("product.item.index" , $product->slug);
    }

    public function show(Product $product , Item $item)
    {
        addVendors(["jalali-date-picker"]);

        $data["title"] = "لیست قیمت ها";
        $data["sizes"] = Size::all();
        $data["product"] = $product;
        $data["item"] = $item;
        $data["price"] = $item->prices()->where("item_id" , $item->id)->first();

        return view($this->view_folder."show" , compact("data"));

    }

    public function update(UpdateItemRequest $request , Product $product , Item $item)
    {
        if (\request()->ajax())
        {
            $this->service->updates(data: $request->toArray() , item: $item);

            return response_as_json("success");
        }

        $this->service->updateItem(data: $request->toArray() , item: $item , product: $product);
        return redirect()->route("product.item.index" , ["product" => $product]);

    }
}
