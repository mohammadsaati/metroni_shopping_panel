<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\City\CreateCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Http\Resources\city\CityResource;
use App\Models\City;
use App\Services\CityService;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private $view_folder = "admin.city.";

    public function __construct(public CityService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "شهر ها";
        $data["cities"] = $this->service->showAll($filter);

        if (\request()->ajax()) {
            return CityResource::collection($data['cities']);
        }

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "شهر جدید";
        $data["provinces"] = City::GetProvinces()->get();

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateCityRequest $request)
    {
        $this->service->createCity($request->toArray());

        return redirect()->route("city.index");
    }

    public function show(City $city)
    {
        $data["title"] = $city->name;
        $data["city"] = $city;
        $data["provinces"] = City::GetProvinces()->get();

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdateCityRequest $request , City $city)
    {
        if (!\request()->ajax())
        {
            $this->service->updateCity(data:  $request->toArray() , city: $city);
            return redirect()->route("city.index");
        } else {
            $this->service->updates(data: $request->toArray() , item: $city);

            return response_as_json("success");
        }

    }
}
