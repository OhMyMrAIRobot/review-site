<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '* Поле обязательно для заполнения',
            'username.string' => '* Поле должно быть строкой',
            'username.max' => '* Поле не должно превышать 255 символов',
            'username.unique' => '* Такое имя пользователя уже используется',

            'email.required' => '* Поле обязательно для заполнения',
            'email.string' => '* Поле должно быть строкой',
            'email.email' => '* Поле должно быть действительным адресом электронной почты',
            'email.max' => '* Поле не должно превышать 255 символов',
            'email.unique' => '* Такой адрес электронной почты уже используется',

            'password.required' => '* Поле обязательно для заполнения',
            'password.string' => '* Поле должно быть строкой',
            'password.min' => '* Пароль должен содержать не менее 8 символов',
            'password.confirmed' => '* Подтверждение пароля не совпадает с паролем',
        ];
    }
}
