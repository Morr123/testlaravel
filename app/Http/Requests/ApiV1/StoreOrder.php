<?php

namespace App\Http\Requests\ApiV1;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tariff;

class StoreOrder extends FormRequest
{	
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
	{
        return [
            'phone'=>'required|regex:/8[0-9]{10}/',
			'name'=>'required',
			'tariff_id'=>'required',
			'weekday'=>'required|in_set:'.(Tariff::class).',weekdays,tariff_id',
			'address'=>'required'
        ];
    }
	
	
	public function messages()
	{
		return [
			'phone.required' => 'Введите номер телефона',
			'phone.regex' => 'Введите номер телефона в указаном формате',
			'name.required'  => 'Введите имя',
			'tariff_id.required'=>'Выберите тариф',
			'weekday.required'=>'Выберите день недели',
			'weekday.in_set'=>'В выбарнном тарифе не существует выбарнного дня недели',
			'address.required'=>'Введите адрес',
		];
	}
	
}
