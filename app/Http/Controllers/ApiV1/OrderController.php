<?php

namespace App\Http\Controllers\ApiV1;

use App\Models\Order;
use App\Http\Requests\ApiV1\StoreOrder;

class OrderController extends Controller
{
	
	public function store(StoreOrder $request){
		$item = Order::store($request->all());
		if($item)
			return $this->responseSuccess(['message'=>__('messages.order.store')]);
		else
			return $this->responseError();
	}
	
}
