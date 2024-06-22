<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    
    public function run()
    {
        
        Area::create([
            'nombre_area' => 'Area Administrativa',
        ]);

        Area::create([
            'nombre_area' => 'Area Asistencial',
        ]);
    }
}
