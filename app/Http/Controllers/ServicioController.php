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
        return response()->json($servicio, 201);
    }

    public function show(Servicio $servicio)
    {
        $servicio->load('area');
        return response()->json($servicio);
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'area_id' => 'required|exists:areas,id',
            'nombre_del_servicio' => 'required|string|max:255',
        ]);

        $servicio->update($request->all());
        return response()->json($servicio);
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return response()->json(null, 204);
    }
}
