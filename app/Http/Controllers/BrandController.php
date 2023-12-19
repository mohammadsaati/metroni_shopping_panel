<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Brand\CreateBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    private string $view_folder = "admin.brand.";

    public function __construct(public BrandService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "برند ها";
        $data["brands"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "برند جدید";

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateBrandRequest $request)
    {
        $this->service->createBrand($request->toArray());

        return redirect()->route("brand.index");
    }

    public function show(Brand $brand)
    {
        $data["title"] = $brand->name;
        $data["brand"] = $brand;

        return view($this->view_folder."show" , compact("data"));
    }


    public function update(UpdateBrandRequest $request , Brand $brand)
    {
        if (!\request()->ajax())
        {
            $this->service->updateBrand(data:  $request->toArray() , brand: $brand);
            return redirect()->route("brand.index");
        } else {
            $this->service->updates(data: $request->toArray() , item: $brand);

            return response_as_json("success");
        }

    }




}
