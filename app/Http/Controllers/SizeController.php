<?php

namespace App\Http\Controllers;

use App\Filters\PublicFilter;
use App\Http\Requests\Size\CreateSizeRequest;
use App\Models\Size;
use App\Services\SizeService;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    private $view_folder = "admin.size.";

    public function __construct(public SizeService $service)
    {
    }

    public function index(PublicFilter $filter)
    {
        $data["title"] = "سایز ها";
        $data["sizes"] = $this->service->showAll($filter);

        return view($this->view_folder."index" , compact("data"));
    }

    public function create()
    {
        $data["title"] = "سایز جدید";

        return view($this->view_folder."create" , compact("data"));
    }

    public function store(CreateSizeRequest $request)
    {
        $this->service->createSize($request->toArray());

        return redirect()->route("size.index");
    }

    public function show(Size $size)
    {
        $data["title"] = "سایز".$size->value;
        $data["size"] = $size;

        return view($this->view_folder."show" , compact("data"));
    }

    public function update(CreateSizeRequest $request , Size $size)
    {
        $this->service->updates(data: $request->toArray() , item: $size);

        return redirect()->route("size.index");
    }
}
