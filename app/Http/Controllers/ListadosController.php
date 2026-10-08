<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listado;

class ListadosController extends Controller
{
    public function index()
{
    try {

        $inicio = microtime(true);

        $listados = Listado::all();

        $fin = microtime(true);

        \Log::info(
            'Consulta listados: ' .
            (($fin - $inicio) * 1000) .
            ' ms'
        );

        return response()->json($listados);

    } catch (\Exception $e) {

        return response()->json([
            'message' => 'Error al obtener los listados.',
            'error' => $e->getMessage()
        ], 500);
    }
}

    public function show($id)
    {
        $listado = Listado::find($id);

        try {

            if (!$listado) {
                return response()->json(['message' => 'Listado no encontrado.'], 404);
            }

            return response()->json($listado);

        } catch (\Exception $e) {

            return response()->json(['message' => 'Error al buscar el listado.', 'error' => $e->getMessage()], 500);

        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        try {

            $listado = Listado::create($request->all());
            return response()->json($listado, 201);

        } catch (\Exception $e) {

            return response()->json(['message' => 'Error al crear el listado.', 'error' => $e->getMessage()], 500);

        }
    }
}
