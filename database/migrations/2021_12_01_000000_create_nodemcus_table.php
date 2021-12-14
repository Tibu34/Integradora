<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeMCUsTable extends Migration
{
	public function up()
	{
		Schema::create('nodemcus', function (Blueprint $table)
		{
			$table->id();
			$table->boolean('refrescar');
			$table->foreignId('id_usuario')->nullable();
		});

		DB::table('nodemcus')->insert(
		[
			'refrescar' => false,
			'id_usuario' => null
		]);
	}

	public function down()
	{
		Schema::dropIfExists('nodemcus');
	}
}