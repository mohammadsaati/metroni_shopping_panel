<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Feature\CreateFeatureRequest;
use App\Http\Requests\Feature\UpdateFeatureRequest;
use App\Models\Feature;
use App\Services\FeatureService;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    private string $view_folder = "admin.feature.";

    public function __construct(public FeatureService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "ویژگی ها";
        $data["features"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "ویژگی جدید";

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateFeatureRequest $request)
    {
        $this->service->createFeature($request->toArray());

        return redirect()->route("feature.index");
    }

    public function show(Feature $feature)
    {
        $data["title"] = $feature->name;
        $data["feature"] = $feature;

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdateFeatureRequest $request , Feature $feature)
    {
       if (!\request()->ajax())
       {
           $this->service->updateFeature(data:  $request->toArray() , feature: $feature);
           return redirect()->route("feature.index");
       } else {
           $this->service->updates(data: $request->toArray() , item: $feature);

           return response_as_json("success");
       }

    }
}
