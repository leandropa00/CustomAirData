<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntoMonitoreo;
use App\User;
use App\Notifications\AlertaTemprana;

class NotificacionesController extends Controller
{
    public function __invoke(PuntoMonitoreo $punto, $valor, $limite, $tipo, $contaminante)
    {        
        $notificacion = [];

        switch ($tipo) {
            case 'menor':
                $notificacion['asunto'] = "Nivel bajo de $contaminante en $punto->alias";
                $notificacion['mensaje'] = "Se registró una medición de $valor del contaminante $contaminante, la cual se encuentra por debajo del nivel mínimo ($limite)";
                break;

            case 'mayor':
                $notificacion['asunto'] = "Nivel de $contaminante excedido en $punto->alias";
                $notificacion['mensaje'] = "Se registró una medición de $valor del contaminante $contaminante, la cual excede el nivel máximo ($limite)";
                break;
        }

        $punto
            ->campana
            ->empresa
            ->usuarios
            ->each(function (User $user) use ($notificacion) {
                $user->notify(new AlertaTemprana($notificacion));     
            });
    }
}
