<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // // Credenciales de Prueba
        // \App\Models\User::insert([
        //     [
        //         'name' => 'Gestion Documental',
        //         'email' => 'gestiondocumental@hrploez.gov.co',
        //         'email_verified_at' => now(),
        //         'password' => bcrypt('Gestiondocumental2024'),
        //         'gender' => 'male',
        //         'active' => 1,
        //         'remember_token' => Str::random(10)
        //     ]
        // ]);
        $userSuperadmin = User::create([
            'name' => 'Gestion Documental',
            'email' => 'gestiondocumental@hrploez.gov.co',
            'email_verified_at' => now(),
                'password' => bcrypt('Dsys2024'),
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
        ]);
        
        $userAdministrativa = User::create([
            'name' => 'Administrativa',
            'email' => 'administrativadocumental@hrploez.gov.co',
            'email_verified_at' => now(),
                'password' => bcrypt('Sysadmin24'),
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
        ]);
        
        $userAsistencial = User::create([
            'name' => 'Asistencial',
            'email' => 'asistencialdocumental@hrploez.gov.co',
            'email_verified_at' => now(),
                'password' => bcrypt('Asismng24'),
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
        ]);
        
        $roleSuperadmin = Role::create(['name' => 'superadmin']);
        $roleAdministrativa = Role::create(['name' => 'administrativa']);
        $roleAsistencial = Role::create(['name' => 'asistencial']);

        // Asignar roles a los usuarios
        $userSuperadmin->assignRole($roleSuperadmin);
        $userAdministrativa->assignRole($roleAdministrativa);
        $userAsistencial->assignRole($roleAsistencial);

        // Guardar los cambios
        $userSuperadmin->save();
        $userAdministrativa->save();
        $userAsistencial->save();
        
    }
}
