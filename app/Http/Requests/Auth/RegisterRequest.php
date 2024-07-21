<?php

namespace App\Http\Requests\Auth;

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
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'password2' => 'required|same:password',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле имя пользователя обязательно для заполнения.',
            'name.max' => 'Имя пользователя не должно превышать 255 символов.',
            'name.min' => 'Имя пользователя должно содержать минимум 3 символа.',
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.email' => 'Введите корректный email.',
            'email.unique' => 'Этот email уже используется.',
            'password.required' => 'Поле пароль обязательно для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password2.required' => 'Поле подтверждение пароля обязательно для заполнения.',
            'password2.same' => 'Пароли не совпадают.',
        ];
    }
}
