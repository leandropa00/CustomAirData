<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Parametro;

class DetallePunto extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    public function municipioP()
    {
        return $this->belongsTo(Parametro::class, 'municipio');
    }

    public function departamentoP()
    {
        return $this->belongsTo(Parametro::class, 'departamento');
    }
}
