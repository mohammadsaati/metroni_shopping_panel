<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Banner\CreateBannerRequest;
use App\Http\Requests\Banner\UpdateBannerRequest;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Services\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $view_folder = "admin.banner.";

    public function __construct(public BannerService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "بنر ها";
        $data["banners"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "بنر جدید";
        $data["products"] = Product::all();
        $data["categories"] = Category::GetSubCategories()->get();

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateBannerRequest $request)
    {
        $this->service->createBanner($request->toArray());

        return redirect()->route("banner.index");
    }

    public function show(Banner $banner)
    {
        $data["title"] = "ویرابش بنر";
        $data["banner"] = $banner;
        $data["products"] = Product::all();
        $data["categories"] = Category::GetSubCategories()->get();

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdateBannerRequest $request , Banner $banner)
    {
        if (\request()->ajax())
        {
            $this->service->updates($request->toArray() , $banner);
            response_as_json("success");
        }
        $this->service->updateBanner(data: $request->toArray() , banner: $banner);

        return redirect()->route("banner.index");
    }

    public function delete(Banner $banner)
    {
        $this->service->deleteBanner($banner);

        return response_as_json("success");
    }
}
