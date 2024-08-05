<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $users = User::all();
            foreach ($users as $user) {
                $newPassword = Str::random(12); // Generar una nueva contraseña aleatoria
                $user->password = Hash::make($newPassword);
                $user->plain_password = $newPassword; // Guardar la contraseña en texto plano (por seguridad se debe almacenar encriptada)
                $user->save();
            }
        })->monthly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
