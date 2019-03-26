<?php

namespace App\Http\Controllers\ApiV1;

use App\Http\Controllers\Controller as BaseController;

abstract class Controller extends BaseController
{
    public function responseSuccess($data = []){
		return response()->json(['result'=>'success'] + $data);
	}
	
	public function responseError($data = []){
		return response()->json(['result'=>'error'] + $data, 422);
	}
}
