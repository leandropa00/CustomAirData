<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parametro;

class TipoParametro extends Model
{
    public function parametros()
    {
        return $this->hasMany(Parametro::class, 'tipo')->orderBy('nombre', 'ASC');
    }
}
