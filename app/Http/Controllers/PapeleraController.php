<?php

namespace App\Http\Controllers;

use App\Models\{Papelera,Documento};
use Illuminate\Http\Request;

class PapeleraController extends Controller
{
    // Display a listing of the trashed documents.
    public function index()
    {
        $trashedDocuments = Papelera::all();
        return view('pages/trash', compact('trashedDocuments'));
    }

    // Restore a trashed document.
    public function restore($id)
    {
        $trashedDocument = Papelera::findOrFail($id);
        Documento::create([
            'carpeta_id' => $trashedDocument->carpeta_id,
            'nombre_documento' => $trashedDocument->nombre_documento,
            'tipo' => $trashedDocument->tipo,
            'peso' => $trashedDocument->peso,
            'en_papelera' => false,
        ]);
        $trashedDocument->delete();
        return redirect()->back()->with('success', 'Document restored successfully.');
    }

    // Permanently delete a trashed document.
    public function destroy($id)
    {
        $trashedDocument = Papelera::findOrFail($id);
        $trashedDocument->delete();
        return redirect()->back()->with('success', 'Document permanently deleted.');
    }
}
