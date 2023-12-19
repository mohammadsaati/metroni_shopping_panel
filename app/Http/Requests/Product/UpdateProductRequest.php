<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
       if (request()->ajax())
       {
           return [
               "status"     =>  "required|in:0,1"
           ];
       }
        return [
            "name"              =>  "required|string|min:3" ,
            "en_name"           =>  "required|string|min:3" ,
            "description"       =>  "required|string|min:3" ,
            "category_id"       =>  "required|exists:categories,id" ,
            "categories"        =>   "nullable|array" ,
            "image"             =>  "sometimes|file|mimes:jpg,png,jpeg,svg" ,
            "shipping_price"    =>  "required|int" ,
            "brand_id"          =>  "nullable|exists:brands,id" ,
            "cities"            =>  "nullable|array" ,
            "status"            =>  "required|in:0,1" ,
            "is_amazing"        =>  "nullable|in:0,1" ,
            "is_amazing_date"   =>  "required_if:is_amazing,1"
        ];
    }
}
