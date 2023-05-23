<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'role' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nickname required to fill',
            'email.required' => 'Email required to fill',
            'email.unique' => 'This email is already used',
        ];
    }
}
