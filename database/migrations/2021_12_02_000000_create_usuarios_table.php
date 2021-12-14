<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
	public function up()
	{
		Schema::create('usuarios', function (Blueprint $table)
		{
			$table->id();
			$table->string('email')->requiered()->unique();
			$table->string('password')->requiered();
			$table->string('nombre')->default('');
			$table->integer('edad')->default(0);
			$table->enum('sexo', ['H', 'M'])->default('H');
		});
	}

	public function down()
	{
		Schema::dropIfExists('usuarios');
	}
}