<?php

namespace App\Http\Controllers\Api;

use App\Models\Cuota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CuotaApiController extends Controller
{
    public function index()
    {
        return Cuota::all();
    }

    public function store(Request $request)
    {
        return Cuota::create($request->all());
    }

    public function show($id)
    {
        return Cuota::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $cuota = Cuota::findOrFail($id);
        $cuota->update($request->all());
        return $cuota;
    }

    public function destroy($id)
    {
        $cuota = Cuota::findOrFail($id);
        $cuota->delete();
        return response()->json(['message' => 'Cuota eliminada correctamente.']);
    }
}
