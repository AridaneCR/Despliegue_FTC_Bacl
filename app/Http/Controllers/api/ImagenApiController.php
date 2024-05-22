<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ImagenApiController extends Controller
{
    // Método para mostrar todas las imágenes
    public function index()
    {
        $imagenes = Imagen::all();
        return response()->json($imagenes);
    }

    // Método para almacenar una nueva imagen
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        // Obtener la imagen del formulario
        $imagen = $request->file('imagen');

        // Guardar la imagen en el almacenamiento
        $ruta = $imagen->store('public/imagenes');

        // Crear una nueva instancia de Imagen y asignar los datos
        $nuevaImagen = new Imagen();
        $nuevaImagen->nombre = $imagen->getClientOriginalName();
        $nuevaImagen->ruta = $ruta;
        $nuevaImagen->empresa_id = $request->empresa_id; // Asignar empresa_id desde la solicitud

        // Guardar la imagen en la base de datos
        $nuevaImagen->save();

        // Retornar una respuesta exitosa
        return response()->json(['message' => 'Imagen subida correctamente']);
    }

    // Método para mostrar una imagen específica
    public function show(Imagen $imagen)
    {
        return response()->json($imagen);
    }

    // Método para actualizar una imagen
    public function update(Request $request, Imagen $imagen)
    {
        // Validar la solicitud
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        // Obtener la nueva imagen del formulario
        $imagenActualizada = $request->file('imagen');

        // Actualizar los datos de la imagen
        $imagen->nombre = $imagenActualizada->getClientOriginalName();
        $imagen->ruta = $imagenActualizada->store('public/imagenes');
        $imagen->empresa_id = $request->empresa_id;

        // Guardar los cambios
        $imagen->save();

        // Retornar una respuesta exitosa
        return response()->json(['message' => 'Imagen actualizada correctamente']);
    }

    // Método para eliminar una imagen
    public function destroy(Imagen $imagen)
    {
        // Eliminar la imagen del almacenamiento
        Storage::delete($imagen->ruta);

        // Eliminar la imagen de la base de datos
        $imagen->delete();

        // Retornar una respuesta exitosa
        return response()->json(['message' => 'Imagen eliminada correctamente']);
    }
}
