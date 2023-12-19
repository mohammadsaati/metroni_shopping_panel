<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Slider\CreateSliderRequest;
use App\Http\Requests\Slider\UpdateSliderRequest;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private string $view_folder = "admin.slider.";
    public function __construct(public SliderService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "اسلایدر ها";
        $data["sliders"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "اسلایدر جدید";

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateSliderRequest $request)
    {
        $this->service->createSlider($request->toArray());

        return redirect()->route("slider.index");
    }

    public function show(Slider $slider)
    {
        $data["title"] = $slider->title;
        $data["slider"] = $slider;

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(UpdateSliderRequest $request , Slider $slider)
    {
        $this->service->updateSlider(data: $request->toArray() , slider: $slider);

        return redirect()->route("slider.index");
    }

    public function delete(Slider $slider)
    {
        $this->service->deleteSlider(slider: $slider);
    }
}
