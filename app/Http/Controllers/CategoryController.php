<?php

namespace App\Http\Controllers;

use App\Filters\CategoryFilter;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;
use App\Http\Resources\category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    private $service;
    private string $view_folder = "admin.category";

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }


    public function index(CategoryFilter $filter)
    {
        $data["title"]      = trans("panel.category_index_title");
        $data["categories"] = $this->service->showAll($filter);

        if (request()->ajax()){
            return CategoryResource::collection($data["categories"]);
        }

        return view($this->view_folder.".index" , compact("data"));
    }

    public function show(Category $category)
    {
        $data["title"] = $category->name;
        $data["category"] = $category;
        $data["parents"] = Category::GetParents()->get();

        return view($this->view_folder.".show" , compact("data"));
    }

    public function create()
    {
        $data["title"] = trans("panel.category_create_title");
        $data["parents"] = Category::GetParents()->get();

        return view($this->view_folder.".create" , compact("data"));
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->service->createCategory($request);

        return redirect()->route("category.index");
    }

    public function update(UpdateCategoryRequest $request , Category $category)
    {
        if (!\request()->ajax())
        {
            $this->service->updateCategory($request->toArray() , $category);
            return redirect()->route("category.index");
        } else {
            return $this->service->ajaxUpdate($request->toArray() , $category);
        }
    }

}
