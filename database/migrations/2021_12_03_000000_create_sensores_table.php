<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensoresTable extends Migration
{
	public function up()
	{
		Schema::create('sensores', function (Blueprint $table)
		{
			$table->id();
			$table->boolean('sensor_boton')->required();
			$table->boolean('sensor_vibracion')->required();
			$table->float('sensor_humedad')->required();
			$table->float('sensor_temperatura')->required();
			$table->float('sensor_ultrasonico')->required();
			$table->float('sensor_ritmo_cardiaco')->required();
			$table->foreignId('id_usuario')->constrained('usuarios')->references('id');
		});
	}

	public function down()
	{
		Schema::dropIfExists('sensores');
	}
}