<?php

namespace App\Http\Controllers\Api;

use App\Models\Oficina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OficinaApiController extends Controller
{
    public function index()
    {
        return Oficina::all();
    }

    public function store(Request $request)
    {
        return Oficina::create($request->all());
    }

    public function show($id)
    {
        return Oficina::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $oficina = Oficina::findOrFail($id);
        $oficina->update($request->all());
        return $oficina;
    }

    public function destroy($id)
    {
        $oficina = Oficina::findOrFail($id);
        $oficina->delete();
        return response()->json(['message' => 'Oficina eliminada correctamente.']);
    }
}
