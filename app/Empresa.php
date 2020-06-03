<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Camapana;
use App\PuntoMonitoreo;

class Empresa extends Model
{
    use SoftDeletes;

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function campanas()
    {
        return $this->hasMany(Campana::class);
    }

    public function puntosMonitoreo()
    {
        return $this->hasManyThrough(
            PuntoMonitoreo::class,
            Campana::class, 
            'empresa_id', // Foreign key on campanas table
            'campana_id' // Foreign key on puntos_monitoreo table
        );
    }
}