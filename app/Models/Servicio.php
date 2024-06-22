<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'nombre_del_servicio'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
