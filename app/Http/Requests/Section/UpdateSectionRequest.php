<?php

namespace App\Http\Requests\Section;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
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
                "status" => "required|in:1,0"
            ];
        }
        return [
            "name"          =>  "required|string|min:3" ,
            "status"        =>  "required|in:1,0" ,
            "bg_color"      =>  "nullable|string" ,
            "bg_image"      =>  "nullable|file|mimes:jpg,jpeg,png" ,
            "product_id"    =>  "array"
        ];
    }
}
