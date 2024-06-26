<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Credenciales de Prueba
        \App\Models\User::insert([
            [
                'name' => 'Gestion Documental',
                'email' => 'gestiondocumental@hrploez.gov.co',
                'email_verified_at' => now(),
                'password' => bcrypt('Gestiondocumental2024'),
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);
        

        
    }
}
