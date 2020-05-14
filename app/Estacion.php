<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\PuntoMonitoreo;

class Estacion extends Model
{
    protected $table="estaciones";
    
    use SoftDeletes;

    public function puntosDeMonitoreo()
    {
        return $this->hasMany(PuntoMonitoreo::class);
    }
}
