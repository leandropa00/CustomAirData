<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntoMonitoreo;
use App\Contaminante;
use App\User;
use Auth;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ConsultaDatosController extends Controller
{
    public function index()
    {
        $estaciones = User::isAdmin() ? PuntoMonitoreo::all() : Auth::user()->empresa->puntosMonitoreo;
        $contaminantes = Contaminante::all();
        return view('consultaDeDatos.index', compact('estaciones', 'contaminantes'));
    }

    public function cargaFiltro(Request $request)
    {
        if ($request['contaminantes']) {
            $punto = PuntoMonitoreo::find($request->location_id);
            $contaminantes = Contaminante::find($request['contaminantes']);
            $datos = $contaminantes->pluck('nombre_campo');
            $view = view('consultaDeDatos.tabla_consulta_datos', compact('contaminantes', 'punto'))->render();

            return [
                'html' => $view, 
                'contaminantes' => $datos,
                'nombre' => $punto->alias.' - '.$punto->campana->nombre.' - '.$punto->campana->empresa->nombre
            ];

        } else {
            echo 'Error, no hay contaminantes seleccionados';
        }
    }

    public function cargarTabla(Request $request)
    {
        $datos = PuntoMonitoreo::find($request->id)
        ->datos()
        ->whereDate('fecha_hora', '>=', Carbon::createFromFormat('m/d/Y', $request->start)->format('Y-m-d'))
        ->whereDate('fecha_hora', '<=', Carbon::createFromFormat('m/d/Y', $request->end)->format('Y-m-d'))
        ->get();
        
        return DataTables::of($datos)

        ->addColumn('date', function($row){
            return Carbon::parse($row->fecha_hora)->format('d/m/Y');
        })

        ->addColumn('time', function($row){
            return Carbon::parse($row->fecha_hora)->format('g:i A');
        })

        ->make(true);
    }

    public function cargarContaminantes(PuntoMonitoreo $punto) 
    {
        return view('consultaDeDatos.contaminantes', ['contaminantes' => $punto->contaminantes])->render();
    }
}
