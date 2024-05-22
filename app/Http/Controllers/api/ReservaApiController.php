<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Http\Controllers\Controller;


class ReservaApiController extends Controller
{
    // Mostrar todas las reservas
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json($reservas);
    }

    // Mostrar una reserva específica
    public function show($id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }
        return response()->json($reserva);
    }

    // Crear una nueva reserva
    public function store(Request $request)
    {
        $request->validate([
            'empresa_id' => 'required',
            'sala_id' => 'required',
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:fecha_hora_inicio',
        ]);

        $reserva = Reserva::create($request->all());
        return response()->json($reserva, 201);
    }

    // Actualizar una reserva existente
    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }

        $request->validate([
            'empresa_id' => 'required',
            'sala_id' => 'required',
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:fecha_hora_inicio',
        ]);

        $reserva->update($request->all());
        return response()->json($reserva, 200);
    }

    // Eliminar una reserva
    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }

        $reserva->delete();
        return response()->json(null, 204);
    }
}
