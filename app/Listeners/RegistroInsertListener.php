<?php

namespace App\Listeners;

use App\Events\RegistroInsertEvent;
use App\Models\Soporte;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class RegistroInsertListener
{
    /**
     * Handle the event.
     *
     * @param  RegistroInsertEvent  $event
     * @return void
     */
    public function handle(RegistroInsertEvent $event)
    {
        // Obtener información relevante del evento
        $model = $event->model;
        $user = Auth::user();

        // Crear un registro de soporte automáticamente
        Soporte::create([
            'user_id' => $user->id,
            'issue_type' => 'Inserción en tabla',
            'description' => "Se realizó una inserción en la tabla {$model->getTable()}",
        ]);
    }
}
