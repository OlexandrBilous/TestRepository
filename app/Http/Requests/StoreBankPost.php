<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bank_name' => 'required|max:20|min:3|unique:banks',
        ];
    }
    public function messages()
    {
        return [
            'bank_name.required' => 'Необходимо указать название банка',
            'bank_name.min' => 'Минимальная длина названия - 3 символа',
            'bank_name.max' => 'Максимальная длина названия - 20 символов',
            'bank_name.unique' => 'Такой банк уже существует',
        ];
    }
}
