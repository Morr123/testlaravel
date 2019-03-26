<?php

namespace App\Models;

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
}
