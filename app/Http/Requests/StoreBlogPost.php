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
            'period' => 'required|numeric|digits_between:1,2',
            'month_pay' => 'required|numeric|digits_between:1,10',
            'body_pay' => 'required|numeric|digits_between:1,10',
            'percent' => 'required|numeric|between:0,100',
            'bank_id' => 'required',
            'credit_type_id' => 'required',
            ];
    }

public function messages()
    {
        return [
            'period.required' => 'Необходимо указать период',
            'period.digits_between' => 'Период не может быть больше 99',
            'month_pay.required' => 'Необходимо указать оплату за месяц',
            'month_pay.digits_between' => 'Плата за месяц слишком велика',
            'body_pay.required' => 'Необходимо указать единовременную оплату',
            'body_pay.digits_between' => 'Единовременная оплата слишком велика',
            'percent.required' => 'Необходимо указать процент',
            'percent.between' => 'Процент не может быть меньше 0 или больще 100',
        ];
    }}
