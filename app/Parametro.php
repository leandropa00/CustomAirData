<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoParametro;

class Parametro extends Model
{
    public function tipo()
    {
        return $this->belongsTo(TipoParametro::class, 'tipo');
    }
}