<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tariff;

class StoreOrder extends FormRequest
{
	public function getValidatorInstance() {
        $validator = parent::getValidatorInstance();
		$validator->after(function() use ($validator){
			$data = $validator->getData();

			Tariff::where('id', $data['tariff_id'])->whereWeekday($data['weekday'])->first() 
			?? 
			$validator->errors()->add('tariff_id', 'Не корректный тариф')
			;
		});
		
		return $validator;
	}
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //public function authorize()
    //{
    //    return false;
    //}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone'=>'required',
			'name'=>'required',
			'tariff_id'=>'required',
			'weekday'=>'required',
			'address'=>'required'
        ];
    }
}
