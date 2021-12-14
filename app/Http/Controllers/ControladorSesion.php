<?php

namespace App\Http\Controllers;

//use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ControladorSesion extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:api', ['except' => ['ingresar', 'registrarse']]);
	}

	// Cuenta
	public function cuenta()
	{
		$usuario = Auth::user();
		$registro = $usuario->with('sensores')->get()->find($usuario->id);
		return response()->json($registro, Response::HTTP_OK);
	}

	// Ingresar
	public function ingresar(Request $request)
	{
		$validacion = Validator::make($request->all(),
		[
			'email' => ['required', 'email'],
			'password' => ['required', 'string', 'min:4']
		]);

		if ($validacion->fails())
			return response()->json($validacion->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);

		if (!$token = Auth::attempt($validacion->validated()))
			return redirect('api/no_autorizado');

		return $this->crear_nuevo_token($token);
	}

	// Registrarse
	public function registrarse(Request $request)
	{
		$validacion = Validator::make($request->all(),
		[
			'email' => ['required', 'email', 'unique:usuarios'],
			'password' => ['required', 'string', 'min:4']
		]);

		if ($validacion->fails())
			return response()->json($validacion->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);

		$usuario = $validacion->validated();
		$usuario['password'] = Hash::make($usuario['password']);
		$usuario = Usuario::create($usuario);
		$token = Auth::login($usuario);

		return $this->crear_nuevo_token($token);
	}

	// Salir
	public function salir(Request $request)
	{
		Auth::logout();
		return response()->json(['mensaje' => 'Sesion Finalizada']);
	}

	// Refrescar
	public function refrescar()
	{
		return $this->crear_nuevo_token(Auth::refresh());
	}

	// Crea un nuevo token de sesion
	protected function crear_nuevo_token($token)
	{
		return response()->json(
		[
			'access_token' => $token,
			'token_type' => 'bearer',
			'expires_in' => Auth::factory()->getTTL() * 60
		]);
	}
}