<?php

use Illuminate\Database\Seeder;

use App\Models\Tariff;

class TariffTableSeeder extends Seeder
{
  
    public function run()
    {
        Tariff::create([
			'name' => 'Тариф 1',
			'cost' => 1000,
			'weekdays' => '0,1,2,5'
		]);
		
		Tariff::create([
			'name' => 'Тариф 2',
			'cost' => 2000,
			'weekdays' => '3,5'
		]);
		
		Tariff::create([
			'name' => 'Тариф 3',
			'cost' => 2500,
			'weekdays' => '6'
		]);
    }
}
