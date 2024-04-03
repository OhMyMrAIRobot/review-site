<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '* Поле обязательно для заполнения',
            'email.string' => '* Поле должно быть строкой',
            'email.email' => '* Поле должно быть действительным адресом электронной почты',

            'password.required' => '* Поле обязательно для заполнения',
            'password.string' => '* Поле должно быть строкой',
            'password.min' => '* Пароль должен содержать не менее 8 символов',
            'password.confirmed' => '* Подтверждение пароля не совпадает с паролем',
        ];
    }
}
