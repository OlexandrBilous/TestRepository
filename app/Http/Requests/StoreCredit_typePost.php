<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCredit_typePost extends FormRequest
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
            'credit_type_name' => 'required|max:20|min:3|unique:credit_types',
        ];
    }
    public function messages()
    {
        return [
            'credit_type_name.required' => 'Необходимо указать тип кредита',
            'credit_type_name.min' => 'Минимальная длина названия - 3 символа',
            'credit_type_name.max' => 'Максимальная длина названия - 20 символов',
            'credit_type_name.unique' => 'Такой тип кредитования уже существует',
        ];
    }
}
