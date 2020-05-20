<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PuntoMonitoreo;

class Dato extends Model
{
    public $timestamps = false;
    
    public function puntoMonitoreo()
    {
        return $this->belongsTo(PuntoMonitoreo::class, 'punto_id');
    }
}
