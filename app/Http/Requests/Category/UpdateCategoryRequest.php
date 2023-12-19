<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        if (!request()->ajax())
        {
            return [
                "name"          =>  "required|min:3" ,
                "parent_id"     =>  "sometimes|nullable|exists:categories,id" ,
                "image"         =>  "sometimes|file|mimes:jpg,png,jpeg" ,
                "priority"      =>  "sometimes|numeric" ,
                "status"        =>  "required|in:0,1"
            ];

        }
        return [
            "status"        =>  "required|in:0,1"
        ];
    }
}
