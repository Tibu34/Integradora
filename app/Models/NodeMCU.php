<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeMCU extends Model
{
	use HasFactory;
	public $table = 'nodemcus';
	public $timestamps = false;

	protected $hidden =
	[
		'id'
	];

	protected $fillable =
	[
		'refrescar',
		'id_usuario'
	];

	protected $casts =
	[
		'refrescar' => 'boolean'
	];
}