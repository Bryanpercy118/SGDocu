<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papelera extends Model
{
    use HasFactory;
    protected $fillable = ['documento_id', 'carpeta_id', 'nombre_documento', 'tipo', 'peso'];

    /**
     * Get the document that is in the trash.
     */
    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
}
