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

            $colores = ['#f76e0f','#28C76F','#EA5455','#FF9F43','#fbdc7f','#dae1e7','#f10606','#2196f3','#795548','#9c27b0','#775959','#459c59','#0d6521','#7f63b1','#93a7e4','#40867f','#8d6e92','#d7ea1d','#5ccbba','#af102c'];

            return view('panelDeAnalisis.index', compact('location_id', 'location', 'locations', 'type', 'start', 'end', 'filtered', 'labels', 'datos', 'colores'));

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
