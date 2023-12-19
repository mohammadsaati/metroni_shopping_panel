<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class CreateSliderRequest extends FormRequest
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
            "title"         =>  "required|string|min:3" ,
            "priority"      =>  "required|int" ,
            "image"         =>  "required|file|mimes:jpg,png,jpeg,svg" ,
            "product_id"    =>  "sometimes|exists:products,id" ,
            "category_id"   =>  "sometimes|exists:categories,id" ,
            "section_id"    =>  "sometimes|exists:sections,id" ,
            "link"          =>  "sometimes" ,
            "type"          =>  "required|int|in:1,2,3" ,
            "status"        =>  "required|int|in:1,2"
        ];
    }
}
