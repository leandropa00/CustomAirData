<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Empresa;
use App\PuntoMonitoreo;

class Campana extends Model
{
    use SoftDeletes;

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function puntosDeMonitoreo()
    {
        return $this->hasMany(PuntoMonitoreo::class);
    }
}