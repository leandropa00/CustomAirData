<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Estacion;
use App\PuntoMonitoreo;
use Carbon\Carbon;
use DB;
use Auth;

class MapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntos = User::isAdmin() ? PuntoMonitoreo::all() : Auth::user()->empresa->puntosMonitoreo;
       
        return view('mapa.index', compact('puntos'));
    }

    public function descripcionMapa($id) 
    {
        $punto = PuntoMonitoreo::find($id);
        $campana = $punto->campana;

        $ultimoDato = $punto->ultimoDato($campana->fecha_fin);

        $contaminantes = $punto->contaminantes;

        return view('mapa.descripcion', compact('campana', 'punto', 'contaminantes', 'ultimoDato'))->render();
    }

    public function grafica($id, $val, $conv)
    {
        $punto = PuntoMonitoreo::find($id);
        $campana = $punto->campana;

        $ultimoDato = $punto->ultimoDato($campana->fecha_fin);
            
        $labels = $punto->datos()
        ->select(DB::raw("date_format(fecha_hora, '%h:%i %p') as datetime"))
        ->where('fecha_hora', '>=', Carbon::parse($ultimoDato->fecha_hora)->subHours('12'))
        ->whereDate('fecha_hora', '<=', $campana->fecha_fin)
        ->pluck('datetime');

        $datos = $punto->datos()
        ->select(DB::raw("round($val*$conv, 2) as datos"))
        ->where('fecha_hora', '>=', Carbon::parse($ultimoDato->fecha_hora)->subHours('12'))
        ->whereDate('fecha_hora', '<=', $campana->fecha_fin)
        ->pluck('datos');

        return view('mapa.grafica', compact('labels', 'datos', 'val'));
    } 
}
