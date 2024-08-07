<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['carpeta_id', 'nombre_documento', 'tipo', 'peso','ruta', 'en_papelera'];

    /**
     * Get the folder that owns the document.
     */
    public function carpeta()
    {
        return $this->belongsTo(Carpeta::class);
    }

    /**
     * Override the delete method to move the document to the trash.
     */
   
}
