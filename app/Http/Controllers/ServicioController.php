<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Soporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('area')->get();
        return response()->json($servicios);
    }

    public function store(Request $request)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'nombre_del_servicio' => 'required|string|max:255',
        ]);

        $servicio = Servicio::create($request->all());

        // Crear registro en Soporte
        $this->createSoporteRecord('Creación de servicio', "Se creó un nuevo servicio {$servicio->nombre_del_servicio}");

        return redirect()->back()->with('success', 'Servicio creado correctamente.');
    }

    public function show(Servicio $servicio)
    {
        $servicio->load(['area', 'carpetas.documentos']); 
        return view('pages.dashboard-overview-3', compact('servicio'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'nombre_del_servicio' => 'required|string|max:255',
        ]);

        $servicio->update($request->all());

        // Crear registro en Soporte
        $this->createSoporteRecord('Actualización de servicio', "Se actualizó el servicio: {$servicio->nombre_del_servicio}");

        return redirect()->back()->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        // Crear registro en Soporte
        $this->createSoporteRecord('Eliminación de servicio', "Se eliminó el servicio: {$servicio->nombre_del_servicio}");

        return redirect()->back()->with('success', 'Servicio eliminado correctamente.');
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
