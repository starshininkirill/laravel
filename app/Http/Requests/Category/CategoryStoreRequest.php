<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя категории обязательно для заполнения.',
            'name.max' => 'Имя категории не должно превышать 255 символов.',
            'name.min' => 'Имя категории должно содержать минимум 3 символа.',
        ];
    }
}
