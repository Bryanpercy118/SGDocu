<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use Illuminate\Http\Request;

class CarpetaController extends Controller
{
    public function index()
    {
        $carpetas = Carpeta::with('servicio', 'documentos')->get();
        return response()->json($carpetas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'nombre_carpeta' => 'required|string|max:255',
        ]);

        $carpeta = Carpeta::create($request->all());
        return redirect()->route('servicios.show', $request->servicio_id)->with('success', 'Carpeta creada con éxito.');
   
    }

    public function show(Carpeta $carpeta)
    {
        $carpeta->load('servicio', 'documentos');
        return response()->json($carpeta);
    }

    public function update(Request $request, Carpeta $carpeta)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'nombre_carpeta' => 'required|string|max:255',
        ]);

        $carpeta->update($request->all());
        return response()->json($carpeta);
    }

    public function destroy(Carpeta $carpeta)
    {
        $carpeta->delete();
        return response()->json(null, 204);
    }
}
