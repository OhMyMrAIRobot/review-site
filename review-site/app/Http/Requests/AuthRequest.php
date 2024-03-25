<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string','max:30'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => '* Поле обязательно для заполнения.',
            'username.string' => '* Поле должно быть строкой.',
            'username.max' => '* Поле не должно превышать 30 символов',

            'password.required' => '* Поле обязательно для заполнения.',
            'password.string' => '* Поле должно быть строкой.',
        ];
    }
}
