<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Airports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function(Blueprint $table){
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->integer('front_pg')->default(0);
            $table->string('ltr_4');
            $table->string('ltr_3');
        });
		
		Schema::create('weather', function($table) {
			$table->string('id');
			$table->string('type');
			$table->string('wind');
			$table->string('baro');
			$table->string('metar');

		});
    }
	

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
