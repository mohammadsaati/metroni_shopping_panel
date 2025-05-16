<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|min:3',
            'email' => ['required', Rule::unique(table: 'admins', column: 'email')->ignore(id: $this->request->get('admin_id'))],
            'password' => 'required|min:4',
            'phone' => 'nullable|min:11|max:11',
        ];
    }
}
