<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::with('carpeta')->get();
        return response()->json($documentos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'carpeta_id' => 'required|exists:carpetas,id',
            'documento' => 'required|file|mimes:pdf', // Validación del archivo PDF con tamaño máximo de 2MB
        ]);

        // Obtener el archivo cargado
        $archivo = $request->file('documento');

        // Guardar el archivo en el almacenamiento
        $rutaArchivo = $archivo->store('documentos');

        // Crear el documento en la base de datos
        $documento = new Documento([
            'carpeta_id' => $request->carpeta_id,
            'nombre_documento' => $archivo->getClientOriginalName(), // Obtener el nombre original del archivo
            'tipo' => $archivo->getClientMimeType(), // Obtener el tipo MIME del archivo
            'peso' => $archivo->getSize(), // Obtener el tamaño del archivo en bytes
        ]);
        $documento->save();

        // Redireccionar de vuelta a la página anterior con un mensaje de éxito
        return back()->with('success', 'Documento cargado correctamente.');
    }



    public function show(Documento $documento)
    {
        $documento->load('carpeta');
        return response()->json($documento);
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'carpeta_id' => 'required|exists:carpetas,id',
            'nombre_documento' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'peso' => 'required|string|max:50',
        ]);

        $documento->update($request->all());
        return response()->json($documento);
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->back();
    }
}
