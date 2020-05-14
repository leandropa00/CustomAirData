<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Campana;
use App\Estacion;
use App\Contaminante;
use App\DetallePunto;
use App\Dato;

class PuntoMonitoreo extends Model
{
    use SoftDeletes;

    protected $table="puntos_monitoreo";

    public function campana()
    {
        return $this->belongsTo(Campana::class);
    }

    public function estacion()
    {
        return $this->belongsTo(Estacion::class);
    }

    public function contaminantes()
    {
        return $this->belongsToMany(Contaminante::class, 'contaminantes_puntos', 'punto_monitoreo_id', 'contaminante_id')->withPivot('minimo', 'maximo');
    }

    public function detalle()
    {
        return $this->hasOne(DetallePunto::class, 'punto_id');
    }

    public function ultimoDato($fechaFin)
    {
        return $this->hasOne(Dato::class, 'punto_id')
            ->whereDate('fecha_hora', '<=', $fechaFin)
            ->get()
            ->last();
    }

    public function datos()
    {
        return $this->hasMany(Dato::class, 'punto_id');
    }
}
