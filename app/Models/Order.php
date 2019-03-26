<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
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
			DB::raw('LOCK TABLES users WRITE');
			$user = User::firstOrNew(['phone'=>$data['phone']]);
			$user->name = $data['name'];
			$user->save();
			
			$item = self::create([
				'user_id'   => $user->id,
				'tariff_id' => $data['tariff_id'],
				'weekday'   => $data['weekday'],
				'address'	=> $data['address']
			]);

			return $item;
		});
	}
    
}
