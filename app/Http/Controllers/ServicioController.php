<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Area;
use Illuminate\Http\Request;

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
        return redirect()->back();
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
        return redirect()->back();
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->back();
    }
}
