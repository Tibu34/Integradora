<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
	use HasFactory;
	public $timestamps = false;

	protected $fillable =
	[
		'email',
		'password',
		'nombre',
		'edad',
		'sexo'
	];

	protected $hidden =
	[
		'password'
	];

	public function sensores()
	{
		return $this->hasMany(Sensores::class, 'id_usuario');
	}

	public function delete()
	{
		$this->sensores()->delete();
		return parent::delete();
	}

	public function getJWTIdentifier()
	{
		return $this->getKey();
	}

	public function getJWTCustomClaims()
	{
		return [];
	}
}