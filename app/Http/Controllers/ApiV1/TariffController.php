<?php

namespace App\Http\Controllers\ApiV1;

use App\Models\Tariff;

class TariffController extends Controller
{
	public function index(){
		return $this->responseSuccess(['data' => Tariff::all()]);
	}
	
}
