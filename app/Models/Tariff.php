<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tariff extends Model
{
	public static $weekdays = [
		'Пн',
		'Вт',
		'Ср',
		'Чт',
		'Пт',
		'Cб',
		'Вс',
	];
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cost', 'weekdays',
    ];

    public function getWeekdaysAttribute($value){
		return collect(explode(',',$value))->transform(function(int $value){
			return [
				'id'=> $value,
				'slug'=> self::$weekdays[$value],
			];
		})->all();
	}
	
	public function scopeWhereWeekday($query, $value){
		$query->whereRaw('FIND_IN_SET(?,weekdays) > 0', [$value]);
	}
}
