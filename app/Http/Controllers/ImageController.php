<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Image\CreateImageRequest;
use App\Models\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $service;

    private string $view_folder = "admin.image";

    public function __construct(ImageService $service)
    {
        $this->service = $service;
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = trans("panel.image_index");
        $data["images"] = $this->service->showAll($filter);

        return view($this->view_folder.".index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = trans("panel.image_create");

        return view($this->view_folder.".create" , compact("data"));
    }

    public function store(CreateImageRequest $request)
    {
        $this->service->createImage($request->toArray());

        return redirect()->route("image.index");
    }

    public function show(Image $image)
    {
        $data["title"] = "عکس | ".$image->name;
        $data["image"] = $image;

        return view($this->view_folder.".show" , compact("data"));
    }

    public function update(CreateImageRequest $request , Image $image)
    {
        $this->service->updateImage(data: $request->toArray() , image: $image);

        return redirect()->route("image.index");
    }

    public function delete(Image $image)
    {
        $this->service->deleteImage($image);
        return response_as_json([
            "message" => "success"
        ]);
    }
}
