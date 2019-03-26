<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id')->index();
			$table->unsignedInteger('tariff_id');
			$table->enum('weekday', [0,1,2,3,4,5,6]);
			$table->text('address');
			$table->timestamps();
        });
		
		Schema::table('orders', function($table) {
		   $table->foreign('user_id')->references('id')->on('users');
		   $table->foreign('tariff_id')->references('id')->on('tariffs');
	   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
