<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PuntoMonitoreo;

class Contaminante extends Model
{
    public function puntosDeMonitoreo()
    {
        return $this->belongsToMany(PuntoMonitoreo::class, 'contaminantes_puntos', 'contaminante_id', 'punto_monitoreo_id');
    }
}