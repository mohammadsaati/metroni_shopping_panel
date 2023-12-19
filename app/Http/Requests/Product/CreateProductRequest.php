<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"                  =>  "required|string|min:3" ,
            "en_name"               =>  "required|string|min:3" ,
            "image"                 =>  "required|file|mimes:jpg,jpeg,png,svg" ,
            "product_galleries"     =>  "nullable|array" ,
            "category_id"           =>  "required|exists:categories,id" ,
            "brand_id"              =>  "nullable|exists:brands,id" ,
            "description"           =>  "required|string|min:3" ,
            "status"                =>  "required|in:0,1" ,
            "city_id"               =>  "nullable|array" ,
            "categories"            =>  "nullable|array" ,
            "is_amazing"            =>  "nullable|in:1,0" ,
            "is_amazing_date"       =>  "required_if:is_amazing,1"
        ];
    }
}
