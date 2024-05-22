<?php

namespace App\Http\Controllers\Api;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalaApiController extends Controller
{
    // Método para mostrar todas las salas
    public function index()
    {
        $salas = Sala::all();
        return response()->json($salas, 200);
    }

    // Método para mostrar una sala específica por su ID
    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return response()->json($sala, 200);
    }

    // Método para crear una nueva sala
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:salas',
        ]);

        $sala = Sala::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json($sala, 201);
    }

    // Método para actualizar una sala existente
    public function update(Request $request, $id)
    {
        $sala = Sala::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:salas,nombre,' . $id,
        ]);

        $sala->nombre = $request->nombre;
        $sala->save();

        return response()->json($sala, 200);
    }

    // Método para eliminar una sala
    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete();

        return response()->json(null, 204);
    }
}
