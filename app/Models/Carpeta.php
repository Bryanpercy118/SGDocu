<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
    use HasFactory;

    protected $fillable = ['servicio_id', 'nombre_carpeta'];

    /**
     * Get the service that owns the folder.
     */
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    /**
     * Get the documents for the folder.
     */
    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }
}
