<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'period' => 'required|digits_between:1,2',
            'month_pay' => 'required|digits_between:1,10',
            'body_pay' => 'required|digits_between: 1,10',
            'percent' => 'required|digits_between:1,3',
            'bank_id' => 'required',
            'credit_type_id' => 'required',
            ];
    }
}
/*public function messages()
    {
        return [
            'comment.required' => 'Необходимо указать комментарий',
            'comment.min' => 'Необходимо написать больше 5 символов',
            'comment.max' => 'Вы превысили заданный размер (больше 255 символов)',
        ];
    }*/
