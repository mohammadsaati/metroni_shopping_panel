<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"          =>  "required|min:3" ,
            "parent_id"     =>  "nullable|exists:categories,id" ,
            "image"         =>  "required|file|mimes:jpg,png,jpeg" ,
            "priority"      =>  "sometimes|numeric" ,
            "status"        =>  "required|in:0,1"
        ];
    }
}
