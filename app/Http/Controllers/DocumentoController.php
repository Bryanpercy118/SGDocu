<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\Papelera;
use Illuminate\Support\Facades\DB;
use App\Models\Soporte;
use Illuminate\Support\Facades\Auth;

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
            'documento' => 'required|file|mimes:pdf',
        ]);

        $archivo = $request->file('documento');
        $rutaArchivo = $archivo->store('documentos');

        $documento = new Documento([
            'carpeta_id' => $request->carpeta_id,
            'nombre_documento' => $archivo->getClientOriginalName(),
            'tipo' => $archivo->getClientMimeType(),
            'peso' => $archivo->getSize(),
            'ruta' => $rutaArchivo, 
            'en_papelera' => false
        ]);
        $documento->save();

        $this->createSoporteRecord('Creación de documento', "Se creó un nuevo documento {$documento->nombre_documento} en la carpeta {$documento->carpeta->nombre_carpeta}");

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

        // Crear registro en Soporte
        $this->createSoporteRecord('Actualización de documento', "Se actualizó el documento {$documento->nombre_documento}");

        return redirect()->back();
    }

    public function descargar(Documento $documento)
    {
        $filePath = storage_path('app/' . $documento->ruta); // Asegúrate de que 'ruta' es el campo correcto
        $this->createSoporteRecord('Descarga de documento', "Se descargo un documento {$documento->nombre_documento} en la carpeta {$documento->carpeta->nombre_carpeta}");
        DB::commit();

        return response()->download($filePath, $documento->nombre_documento);
    }



    public function destroy(Documento $documento)
    {
        DB::beginTransaction();
        try {
            // Crear el objeto Papelera
            Papelera::create([
                'documento_id' => $documento->id,
                'carpeta_id' => $documento->carpeta_id,
                'nombre_documento' => $documento->nombre_documento,
                'tipo' => $documento->tipo,
                'peso' => $documento->peso,
            ]);

            // Actualizar el documento para marcarlo como en la papelera
            $documento->update([
                'en_papelera' => true,
            ]);

            // Crear registro en Soporte
            $this->createSoporteRecord('Eliminación de documento', "Se eliminó el documento {$documento->nombre_documento}");

            DB::commit();

            // Redireccionar con éxito
            return redirect()->back()->with('success', 'Documento movido a la papelera exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd('Error al mover el documento a la papelera:', $e->getMessage());
        }
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
