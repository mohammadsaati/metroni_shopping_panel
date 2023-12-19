<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class CreateBannerRequest extends FormRequest
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
            "image"             =>  "required|file|mimes:jpg,jpeg,svg,png" ,
            "type"              =>  "required|in:1,2,3" ,
            "product_id"        =>  "required_if:type,1|exists:products,id" ,
            "category_id"       =>  "required_if:type,2|exists:categories,id" ,
            "status"            =>  "required|in:1,0" ,
            "link"              =>  "required_if:type,3|string"
        ];
    }
}
