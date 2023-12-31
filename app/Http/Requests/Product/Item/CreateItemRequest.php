<?php

namespace App\Http\Requests\Product\Item;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest
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
            "size_id"           =>  "required|exists:sizes,id" ,
            "stock"             =>  "required|int" ,
            "status"            =>  "required|in:1,0" ,
            "price"             =>  "required|int" ,
            "shipping_price"    =>  "required|int" ,
            "discount"          =>  "nullable" ,
            "off_deadline"      =>  "nullable"
        ];
    }
}
