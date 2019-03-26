<?php

namespace App\Models;

use DB;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
		'tariff_id',
		'weekday',
		'address'
    ];
	
	
	public static function store(array $data){
		return DB::transaction(function() use($data){
			User::lockTable();
			$user = User::updateOrCreate(['phone'=>$data['phone']], ['name'=>$data['name']]);
			$item = self::create(['user_id' => $user->id] + $data);
			return $item;
		});
	}
    
}
