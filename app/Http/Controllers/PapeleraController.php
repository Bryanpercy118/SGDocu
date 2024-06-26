<?php

namespace App\Http\Controllers;

use App\Models\Papelera;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Soporte;

class PapeleraController extends Controller
{
    // Restaurar un documento de la papelera.
    public function restore($id)
    {
        $trashedDocument = Papelera::findOrFail($id);

        // Restaurar el documento en la tabla correspondiente (por ejemplo, Documento).
        Documento::create([
            'carpeta_id' => $trashedDocument->carpeta_id,
            'nombre_documento' => $trashedDocument->nombre_documento,
            'tipo' => $trashedDocument->tipo,
            'peso' => $trashedDocument->peso,
            'en_papelera' => false,
        ]);

        // Crear registro en Soporte
        $this->createSoporteRecord('Restauración de documento', "Se restauró un documento desde la papelera (ID: {$trashedDocument->nombre_documento})");

        // Eliminar el documento de la papelera.
        $trashedDocument->delete();

        return redirect()->back()->with('success', 'Documento restaurado correctamente.');
    }

    // Eliminar permanentemente un documento de la papelera.
    public function destroy($id)
    {
        $trashedDocument = Papelera::findOrFail($id);

        // Crear registro en Soporte
        $this->createSoporteRecord('Eliminación permanente de documento', "Se eliminó permanentemente un documento desde la papelera (ID: {$trashedDocument->nombre_documento})");

        // Eliminar el documento de la papelera.
        $trashedDocument->delete();

        return redirect()->back()->with('success', 'Documento eliminado permanentemente.');
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
