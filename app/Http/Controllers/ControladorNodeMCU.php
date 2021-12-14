<?php

namespace App\Http\Controllers;

use App\Models\NodeMCU;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ControladorNodeMCU extends Controller
{
	// GET
	public function index()
	{
		return response()->json(NodeMCU::find(1), Response::HTTP_OK);
	}

	// POST
	public function store(Request $request)
	{
		$nodemcu = NodeMCU::find(1);
		$nodemcu->refrescar = false;
		$nodemcu->id_usuario = null;
		$nodemcu->update();
		return response()->json($nodemcu, Response::HTTP_OK);
	}

	// PUT /{id}
	public function update(Request $request, int $id)
	{
		$nodemcu = NodeMCU::find(1);
		$nodemcu->refrescar = true;
		$nodemcu->id_usuario = $id;
		$nodemcu->update();
		return response()->json($nodemcu, Response::HTTP_OK);
	}
}