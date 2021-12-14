<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensores extends Model
{
	use HasFactory;
	public $timestamps = false;

	protected $hidden =
	[
		'id_usuario'
	];

	protected $fillable =
	[
		'id_usuario',
		'sensor_boton',
		'sensor_vibracion',
		'sensor_humedad',
		'sensor_temperatura',
		'sensor_ultrasonico',
		'sensor_ritmo_cardiaco'
	];

	protected $casts =
	[
		'sensor_boton' => 'boolean',
		'sensor_vibracion' => 'boolean'
	];
}