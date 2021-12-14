<?php

namespace App\Http\Controllers;

use App\Models\Sensores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ControladorSensores extends Controller
{
	// GET
	public function index()
	{
		return response()->json(Sensores::all(), Response::HTTP_OK);
	}

	// GET /{id}
	public function show(int $id)
	{
		$sensores = Sensores::find($id);
		return response()->json($sensores, Response::HTTP_OK);
	}

	// POST
	public function store(Request $request)
	{
		$sensores = Sensores::create($request->all());
		return response()->json($sensores, Response::HTTP_OK);
	}

	// DELETE /{id}
	public function destroy(int $id)
	{
		$sensores = Sensores::find($id);

		if (Auth::user()->id != $sensores->id_usuario)
			return redirect('api/no_autorizado');

		$sensores->delete();
		return response()->json(null, Response::HTTP_NO_CONTENT);
	}
}