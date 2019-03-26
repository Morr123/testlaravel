<?php

namespace App\Http\Controllers;

use App\Models\Tariff;

class TariffController extends Controller
{
	
	public function index(){
		return response()->json([
			'result' => 'success',
			'data' => Tariff::all()
		]);
	}
	
}
