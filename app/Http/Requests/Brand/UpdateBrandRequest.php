<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
                "status"    =>  "required|in:0,1",
            ];
        }
        return [
            "name"      =>  "required|string|min:3" ,
            "image"     =>  "sometimes|file|mimes:jpg,png,jpeg,svg" ,
            "status"    =>  "required|in:0,1"
        ];
    }
}
