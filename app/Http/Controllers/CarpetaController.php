<?php

namespace App\Http\Controllers;

use App\Models\Carpeta;
use App\Models\Documento;
use App\Models\Soporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // Crear registro en Soporte
        $this->createSoporteRecord('Creación de carpeta', "Se creó una nueva carpeta {$carpeta->nombre_carpeta}");

        return redirect()->route('servicios.show', $request->servicio_id)->with('success', 'Carpeta creada con éxito.');
    }

    public function show(Carpeta $carpeta)
    {
        $carpeta->load('servicio', 'documentos');
        return view('pages.folder', compact('carpeta'));
    }

    public function update(Request $request, Carpeta $carpeta)
    {
        $request->validate([
            'nombre_carpeta' => 'required|string|max:255',
        ]);

        $carpeta->update($request->all());

        // Crear registro en Soporte
        $this->createSoporteRecord('Actualización de carpeta', "Se actualizó la carpeta {$carpeta->nombre_carpeta}");

        return redirect()->route('servicios.show', $carpeta->servicio_id)->with('success', 'Carpeta actualizada correctamente.');
    }

    
    public function destroy(Carpeta $carpeta)
    {
        // Obtener el ID del servicio antes de eliminar la carpeta
        $servicioId = $carpeta->servicio_id;

        $carpeta->delete();

        // Crear registro en Soporte
        $this->createSoporteRecord('Eliminación de carpeta', "Se eliminó la carpeta {$carpeta->nombre_carpeta}");

        return redirect()->route('servicios.show', $servicioId)->with('success', 'Carpeta eliminada con éxito.');
    }

    // Método privado para crear registro en Soporte
    private function createSoporteRecord($issueType, $description)
    {
        $user = Auth::user();

        Soporte::create([
            'user_id' => $user->id,
            'issue_type' => $issueType,
            'description' => $description,
        ]);
    }

    
}
