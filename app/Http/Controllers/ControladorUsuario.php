<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ControladorUsuario extends Controller
{
	// PUT
	public function update(Request $request)
	{
		$usuario = Auth::user();
		if ($request->password)
			$request['password'] = Hash::make($request->password);
		$usuario->update($request->all());
		return response()->json($usuario, Response::HTTP_OK);
	}

	// DELETE
	public function destroy()
	{
		Auth::user()->delete();
		return response()->json(null, Response::HTTP_NO_CONTENT);
	}
}