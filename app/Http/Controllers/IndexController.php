<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
	
	public function index(){
		//$user = User::where('phone', '123')->first();
		//if(!$user)
		//	User::create(['name'=>'1', 'phone'=>'123']);
		
		return view('index');
	}
	
}
