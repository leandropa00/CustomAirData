<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntoMonitoreo;
use App\Estacion;
use App\Dato;
use App\User;
use Auth;
use DB;
use Carbon\Carbon;

class PanelAnalisisController extends Controller
{
    public function index(Request $request)
    {
        $locations = User::isAdmin() ? PuntoMonitoreo::all() : Auth::user()->empresa->puntosMonitoreo;

        if ($request->submit) {
            $dates = explode(' - ', $request->dates);
            $start = Carbon::createFromFormat('m/d/Y', $dates[0])->format('Y-m-d');
            $end = Carbon::createFromFormat('m/d/Y', $dates[1])->format('Y-m-d');
            $location_id = $request->location;
            $location = PuntoMonitoreo::find($location_id);
            $type = $request->type;
            $filtered = true;

            $datos = [];

            switch ($type) {
                case '10min':
                    $labels = $location->datos()
                        ->select(DB::raw("date_format(fecha_hora, '%d/%m/%Y %h:%i %p') as datetime"))
                        ->whereDate('fecha_hora', '>=', $start)
                        ->whereDate('fecha_hora', '<=', $end)
                        ->pluck('datetime');

                    foreach ($location->contaminantes as $item) {
                        $contaminante = $location->datos()
                            ->select(DB::raw("
                                CASE 
                                    WHEN LENGTH(SUBSTRING_INDEX($item->nombre_campo, '.', -1)) = 3 
                                        THEN null 
                                    ELSE 
                                        round($item->nombre_campo, 2) 
                                    END 
                                as datos
                            "))
                            ->whereDate('fecha_hora', '>=', $start)
                            ->whereDate('fecha_hora', '<=', $end)
                            ->pluck('datos');
        
                        $datos[$item->nombre_campo] = $contaminante;
                    }

                    break;
                
                case '1hora':
                    $labels = $location->datos()
                        ->select(DB::raw("date_format(fecha_hora, '%d/%m/%Y %h:%i %p') as datetime, date_format(fecha_hora, '%i') as hora"))
                        ->whereDate('fecha_hora', '>=', $start)
                        ->whereDate('fecha_hora', '<=', $end)
                        ->having('hora', '00')
                        ->pluck('datetime');

                    foreach ($location->contaminantes as $item) {
                        $contaminante = $location->datos()
                            ->select(DB::raw("
                            CASE 
                                WHEN LENGTH(SUBSTRING_INDEX($item->nombre_campo, '.', -1)) = 3 
                                    THEN null 
                                ELSE 
                                    round($item->nombre_campo, 2) 
                                END 
                            as datos, date_format(fecha_hora, '%i') as hora"))
                            ->whereDate('fecha_hora', '>=', $start)
                            ->whereDate('fecha_hora', '<=', $end)
                            ->having('hora', '00')
                            ->pluck('datos');
        
                        $datos[$item->nombre_campo] = $contaminante;
                    }
                    break;
                
                case '8horas':
                    $labels = $location->datos()
                        ->select(DB::raw("date_format(fecha_hora, '%d/%m/%Y %h:%i %p') as datetime, date_format(fecha_hora, '%H:%i') as hora"))
                        ->whereDate('fecha_hora', '>=', $start)
                        ->whereDate('fecha_hora', '<=', $end)
                        ->havingRaw("hora in ('00:00','08:00','16:00')")
                        ->pluck('datetime');

                    foreach ($location->contaminantes as $item) {
                        $contaminante = $location->datos()
                            ->select(DB::raw("
                            CASE 
                                WHEN LENGTH(SUBSTRING_INDEX($item->nombre_campo, '.', -1)) = 3 
                                    THEN null 
                                ELSE 
                                    round($item->nombre_campo, 2) 
                                END 
                            as datos, date_format(fecha_hora, '%H:%i') as hora"))
                            ->whereDate('fecha_hora', '>=', $start)
                            ->whereDate('fecha_hora', '<=', $end)
                            ->havingRaw("hora in ('00:00','08:00','16:00')")
                            ->pluck('datos');
        
                        $datos[$item->nombre_campo] = $contaminante;
                    }
                    break;
                
                case 'diario':
                    $labels = $location->datos()
                        ->select(DB::raw("date_format(fecha_hora, '%d/%m/%Y') as datetime"))
                        ->whereDate('fecha_hora', '>=', $start)
                        ->whereDate('fecha_hora', '<=', $end)
                        ->groupBy(DB::raw("date(fecha_hora)"))
                        ->pluck('datetime');

                    foreach ($location->contaminantes as $item) {
                        $contaminante = $location->datos()
                            ->select(DB::raw("round(avg($item->nombre_campo),2) as datos"))
                            ->whereDate('fecha_hora', '>=', $start)
                            ->whereDate('fecha_hora', '<=', $end)
                            ->groupBy(DB::raw("date(fecha_hora)"))
                            ->pluck('datos');
        
                        $datos[$item->nombre_campo] = $contaminante;
                    }
                    break;
            }

            $minval = Dato::select(DB::raw('
                MIN(pm10) as pm10, MAX(pm10) as pm10max, round(AVG(pm10), 2) as pm10avg,
                MIN(pm25) as pm25, MAX(pm25) as pm25max, round(AVG(pm25), 2) as pm25avg,
                MIN(tsp) as tsp, MAX(tsp) as tspmax, round(AVG(tsp), 2) as tspavg,
                MIN(so2) as so2, MAX(so2) as so2max, round(AVG(so2), 2) as so2avg,
                MIN(o3) as o3, MAX(o3) as o3max, round(AVG(o3), 2) as o3avg,
                MIN(co) as co, MAX(co) as comax, round(AVG(co), 2) as coavg,
                MIN(no) as no, MAX(no) as nomax, round(AVG(no), 2) as noavg,
                MIN(no2) as no2, MAX(no2) as no2max, round(AVG(no2), 2) as no2avg,
                MIN(nox) as nox, MAX(nox) as noxmax, round(AVG(nox), 2) as noxavg,
                MIN(dv) as dv, MAX(dv) as dvmax, round(AVG(dv), 2) as dvavg,
                MIN(vv) as vv, MAX(vv) as vvmax, round(AVG(vv), 2) as vvavg,
                MIN(hr) as hr, MAX(hr) as hrmax, round(AVG(hr), 2) as hravg,
                MIN(temp) as temp, MAX(temp) as tempmax, round(AVG(temp), 2) as tempavg,
                MIN(pb) as pb, MAX(pb) as pbmax, round(AVG(pb), 2) as pbavg,
                MIN(rs) as rs, MAX(rs) as rsmax, round(AVG(rs), 2) as rsavg,
                MIN(rain) as rain, MAX(rain) as rainmax, round(AVG(rain), 2) as rainavg,
                MIN(humedad) as humedad, MAX(humedad) as humedadmax, round(AVG(humedad), 2) as humedadavg,
                MIN(temp2) as temp2, MAX(temp2) as temp2max, round(AVG(temp2), 2) as temp2avg,
                MIN(vel_aspiracion) as vel_aspiracion, MAX(vel_aspiracion) as vel_aspiracionmax, round(AVG(vel_aspiracion), 2) as vel_aspiracionavg,
                MIN(estado_puerta) as estado_puerta, MAX(estado_puerta) as estado_puertamax, round(AVG(estado_puerta), 2) as estado_puertaavg
                '))
                ->whereDate('fecha_hora', '>=', $start)
                ->whereDate('fecha_hora', '<=', $end)
                ->first();

            $colores = ['#f76e0f','#28C76F','#EA5455','#FF9F43','#fbdc7f','#dae1e7','#f10606','#2196f3','#795548','#9c27b0','#775959','#459c59','#0d6521','#7f63b1','#93a7e4','#40867f','#8d6e92','#d7ea1d','#5ccbba','#af102c'];

            return view('panelDeAnalisis.index', compact('location_id', 'location', 'locations', 'type', 'start', 'end', 'filtered', 'labels', 'datos', 'colores', 'minval'));

        } else {
            $start = '';
            $end = '';
            $location_id = 0;
            $type = 0;
            $filtered = false;
        }

        return view('panelDeAnalisis.index', compact('location_id', 'locations', 'type', 'start', 'end', 'filtered'));
       
    } 
}
