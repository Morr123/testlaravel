<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrder;

class OrderController extends Controller
{
	
	public function store(StoreOrder $request){
		$item = Order::store($request->all());
		if($item)
			return response()->json(['result'=>'success']);
		else
			return response()->json(['result'=>'error'], 422);
	}
	
}
