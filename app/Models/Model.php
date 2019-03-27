<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use DB;

abstract class Model extends BaseModel
{
	public static function getTableName(){
        return with(new static)->getTable();
    }
	
    public static function lockTable(){
		DB::raw('LOCK TABLES '.self::getTableName().' WRITE');
	}
	
	public function scopeFindInSet($query, $field, $value){
		if(!preg_match("/\w+/", $field))
			throw new \Exception('Encorrect field');
			
		$query->whereRaw("FIND_IN_SET(?,$field) > 0", [$value]);
	}
    
}
