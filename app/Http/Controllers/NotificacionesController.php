<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntoMonitoreo;
use App\User;
use Auth;
use App\Notifications\AlertaTemprana;

class NotificacionesController extends Controller
{
    public function niveles(PuntoMonitoreo $punto, $valor, $limite, $tipo, $contaminante)
    {        
        $notificacion = [];

        switch ($tipo) {
            case 'menor':
                $notificacion['asunto'] = "Nivel bajo de $contaminante en $punto->alias";
                $notificacion['mensaje'] = "El canal $contaminante del punto de monitoreo $punto->alias - ".$punto->campana->nombre." registró $valor, el cual se encuentra por debajo del nivel de alerta establecido en $limite";                
                break;

            case 'mayor':
                $notificacion['asunto'] = "Nivel de $contaminante excedido en $punto->alias";
                $notificacion['mensaje'] = "El canal $contaminante del punto de monitoreo $punto->alias - ".$punto->campana->nombre." registró $valor, el cual excede el nivel de alerta establecido en $limite";
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

    public function cargaDatos(PuntoMonitoreo $punto, $hora)
    {        
        $notificacion['asunto'] = "Error en la carga de datos de ".$punto->alias;
        $notificacion['mensaje'] = "No hay datos para hoy después de las $hora en ".$punto->alias.' - '.$punto->campana->nombre.' - '.$punto->campana->empresa->nombre;      
        User::find(1)->notify(new AlertaTemprana($notificacion)); 
    }

    public function banderas(PuntoMonitoreo $punto, $hora, $bandera)
    {        
        $notificacion['asunto'] = "Error en la carga de datos de ".$punto->alias;
        $notificacion['mensaje'] = "Se encontró la bandera $bandera en el punto de monitoreo ".$punto->alias.' - '.$punto->campana->nombre.' - '.$punto->campana->empresa->nombre." a las $hora";   
        User::find(1)->notify(new AlertaTemprana($notificacion));
    }

    public function marcarComoLeidas()
    {        
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
