<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PuntoMonitoreo;
use App\Estacion;
use App\Campana;
use App\DetallePunto;
use App\Contaminante;
use App\TipoParametro;
use App\Dato;
use DB;
use Illuminate\Support\Facades\Hash;

class PuntosMonitoreoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $campana = Campana::find($id);
        $puntos_monitoreo = $campana->puntosDeMonitoreo;
        return view('puntosMonitoreo.index',compact('campana', 'puntos_monitoreo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $campana = Campana::find($id);
        $estaciones = Estacion::all();
        $contaminantes = Contaminante::all();
        $departamentos = TipoParametro::find(1)->parametros;
        $municipios = TipoParametro::find(2)->parametros;

        return view('puntosMonitoreo.crear', compact('campana', 'estaciones', 'contaminantes', 'departamentos', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $rutaDatos = '/home/logjanec/airlab.com.co/'.strtolower($request->ruta).'/';

        if (is_dir($rutaDatos)) {
            $ruta = '/images/puntos_monitoreo/';

            if($request->hasFile('photo_nort')){
                $fileN = $request->file('photo_nort');
                $nameN = time().$fileN->getClientOriginalName();
                $fileN->move(public_path().$ruta, $nameN);

            } else $nameN = '';

            if($request->hasFile('photo_sur')){
                $fileS = $request->file('photo_sur');
                $nameS = time().$fileS->getClientOriginalName();
                $fileS->move(public_path().$ruta, $nameS);

            } else $nameS = '';

            if($request->hasFile('foto_este')){
                $fileE = $request->file('foto_este');
                $nameE = time().$fileE->getClientOriginalName();
                $fileE->move(public_path().$ruta, $nameE);

            } else $nameE = '';

            if($request->hasFile('foto_oeste')){
                $fileO = $request->file('foto_oeste');
                $nameO = time().$fileO->getClientOriginalName();
                $fileO->move(public_path().$ruta, $nameO);

            } else $nameO = '';

            DB::transaction(function () use($id, $request, $nameN, $nameS, $nameE, $nameO, $rutaDatos) {
                $campana = Campana::find($id);

                $punto_monitoreo = new PuntoMonitoreo;
                $punto_monitoreo->alias = $request->punto_name;
                $punto_monitoreo->estacion_id = $request->estacion_id;
                $punto_monitoreo->ruta = $rutaDatos;
                $punto_monitoreo->latitud = $request->coordA_name;
                $punto_monitoreo->longitud = $request->coordB_name;
                $punto_monitoreo->carga_automatica = isset($request->carga_automatica) ? '1' : '0';
                $campana->puntosDeMonitoreo()->save($punto_monitoreo);

                $punto_monitoreo->contaminantes()->sync($request->contaminantes);

                $detalle_punto = new DetallePunto;
                $detalle_punto->descripcion = $request->notes;
                $detalle_punto->departamento = $request->depto_name;
                $detalle_punto->municipio = $request->muni_name;
                $detalle_punto->direccion = $request->dir_name;
                $detalle_punto->foto_norte = $nameN;
                $detalle_punto->foto_sur = $nameS;
                $detalle_punto->foto_este = $nameE;
                $detalle_punto->foto_oeste = $nameO;
                $detalle_punto->tipo_area = $request->area;
                $detalle_punto->tiempo = $request->time;
                $detalle_punto->emision_dominante = $request->emition;
                $detalle_punto->distancia_borde = $request->distancia_borde;
                $detalle_punto->ancho_via = $request->ancho_via;
                $detalle_punto->velocidad_promedio = $request->velocidad_prom;
                $detalle_punto->porcentaje_vehiculos_pesados = $request->porc_vehiculo_pes;
                $detalle_punto->estado_via = $request->est_via;
                $detalle_punto->trafico_diario_sentido_uno = isset($request->traf_uno) ? '1' : '0';
                $detalle_punto->trafico_diario_sentido_dos = isset($request->traf_dos) ? '1' : '0';
                $detalle_punto->tiempo_muestreo = $request->tiempo_muestreo;
                $detalle_punto->clima = $request->clima;
                $detalle_punto->tipo = $request->tipo;
                $detalle_punto->distancia_fuente = $request->distancia;
                $detalle_punto->direccion_grados = $request->dir_grados;
                $detalle_punto->fuente_evualuada = $request->fuent_eval;
                $detalle_punto->cercania_ciudades = $request->cerc_ciu;
                $detalle_punto->observaciones_punto_critico = $request->obs_cerc_ciu;
                $detalle_punto->distancia_cabecera_municipal = $request->dist_cab;
                $detalle_punto->observaciones_distancia_cabecera_municipal = $request->obs_dist_cab;
                $detalle_punto->cobertura_3g = $request->cob_3g;
                $detalle_punto->observaciones_cobertura_3g = $request->obs_cob_3g;
                $detalle_punto->tipo_acceso_unidad = $request->tipo_acces;
                $detalle_punto->observaciones_tipo_acceso = $request->obs_tipo_acces;
                $detalle_punto->horario_atencion = $request->hor_aten;
                $detalle_punto->observaciones_horario_atencion = $request->obs_hor_aten;
                $detalle_punto->distancia_punto_conexion = $request->dist_punt;
                $detalle_punto->observaciones_distancia_punto_conexion = $request->obs_dist_punt;
                $detalle_punto->distancia_estacion_servicio = $request->dist_est;
                $detalle_punto->observaciones_distancia_estacion_servicio = $request->obs_dist_est;
                $detalle_punto->tiempo_acceso_punto_monitoreo = $request->tim_acce;
                $detalle_punto->observaciones_tiempo_acceso_punto_monitoreo = $request->obs_tim_acce;
                $detalle_punto->condiciones_seguridad = $request->cond_seg;
                $detalle_punto->observaciones_condiciones_seguridad = $request->obs_cond_seg;
                $detalle_punto->condiciones_seguridad_checkbox = isset($request->cond_seg_check) ? '1' : '0';
                $detalle_punto->observaciones_condiciones_seguridad_checkbox = $request->obs_cond_seg_check;
                $detalle_punto->exposicion_sensores = isset($request->expo_tom_check) ? '1' : '0';
                $detalle_punto->observaciones_exposicion_sensores = $request->obs_no_exp_tom;
                $detalle_punto->condiciones_logistica = isset($request->cond_logis_check) ? '1' : '0';
                $detalle_punto->observaciones_condiciones_logistica = $request->obs_cond_logis_check;
                $detalle_punto->cercania_parqueadero = isset($request->cerc_parq_check) ? '1' : '0';
                $detalle_punto->observaciones_cercania_parqueadero = $request->obs_cerc_parq_check;
                $detalle_punto->cercania_carreteras_sin_pavimento = isset($request->cerc_carr_sin_check) ? '1' : '0';
                $detalle_punto->observaciones_cercania_carreteras_sin_pavimento = $request->obs_cerc_carr_sin;
                $detalle_punto->descripcion_contacto = $request->desc_contacto;
                $detalle_punto->nombre_contacto = $request->nom_contacto;
                $detalle_punto->celular_contacto = $request->cel_contacto;
                $detalle_punto->fijo_contacto = $request->fij_contacto;
                $detalle_punto->email_contacto = $request->email_contacto;
                $punto_monitoreo->detalle()->save($detalle_punto);
            });
            
            return redirect()->route('puntos-monitoreo.index', $id)->with('success', 'Punto de monitoreo creado satisfactoriamente');

        } else return redirect()->route('puntos-monitoreo.create', $id)->with('failed', 'Ruta inválida, intenta de nuevo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puntoMonitoreo = PuntoMonitoreo::find($id);
        $view = view('puntosMonitoreo.modal', compact('puntoMonitoreo'))->render();

        return [
            'titulo' => $puntoMonitoreo->alias, 
            'html' => $view
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puntoMonitoreo = PuntoMonitoreo::find($id);
        $estaciones = Estacion::all();
        $departamentos = TipoParametro::find(1)->parametros;
        $municipios = TipoParametro::find(2)->parametros;
        $contaminantes = Contaminante::select('contaminantes.*', 'contaminantes_puntos.punto_monitoreo_id')
        ->leftjoin('contaminantes_puntos', function ($query) use ($id) {
        $query->on('contaminantes.id', 'contaminantes_puntos.contaminante_id')
                ->where('contaminantes_puntos.punto_monitoreo_id', $id);
        })
        ->orderBy('contaminantes.id')
        ->get();
        
        return view('puntosMonitoreo.editar', compact('puntoMonitoreo', 'contaminantes', 'estaciones', 'departamentos', 'municipios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rutaDatos = '/home/logjanec/airlab.com.co/'.strtolower($request->ruta).'/';

        if (is_dir($rutaDatos)) {
            $ruta = '/images/puntos_monitoreo/';
            $punto_monitoreo = PuntoMonitoreo::find($id);

            if($request->hasFile('photo_nort')){
                $fileN = $request->file('photo_nort');
                $nameN = time().$fileN->getClientOriginalName();
                $fileN->move(public_path().$ruta, $nameN);

            } else $nameN = $punto_monitoreo->detalle->foto_norte;

            if($request->hasFile('photo_sur')){
                $fileS = $request->file('photo_sur');
                $nameS = time().$fileS->getClientOriginalName();
                $fileS->move(public_path().$ruta, $nameS);

            } else $nameS = $punto_monitoreo->detalle->foto_sur;

            if($request->hasFile('foto_este')){
                $fileE = $request->file('foto_este');
                $nameE = time().$fileE->getClientOriginalName();
                $fileE->move(public_path().$ruta, $nameE);

            } else $nameE = $punto_monitoreo->detalle->foto_este;

            if($request->hasFile('foto_oeste')){
                $fileO = $request->file('foto_oeste');
                $nameO = time().$fileO->getClientOriginalName();
                $fileO->move(public_path().$ruta, $nameO);

            } else $nameO = $punto_monitoreo->detalle->foto_oeste;

            DB::transaction(function () use($punto_monitoreo, $request, $nameN, $nameS, $nameE, $nameO, $rutaDatos) {

                $punto_monitoreo->alias = $request->punto_name;
                $punto_monitoreo->estacion_id = $request->estacion_id;
                $punto_monitoreo->ruta = $rutaDatos;
                $punto_monitoreo->latitud = $request->coordA_name;
                $punto_monitoreo->longitud = $request->coordB_name;
                $punto_monitoreo->carga_automatica = isset($request->carga_automatica) ? '1' : '0';
                $punto_monitoreo->save();

                $punto_monitoreo->contaminantes()->sync($request->contaminantes);

                $detalle_punto = $punto_monitoreo->detalle;
                $detalle_punto->descripcion = $request->notes;
                $detalle_punto->departamento = $request->depto_name;
                $detalle_punto->municipio = $request->muni_name;
                $detalle_punto->direccion = $request->dir_name;
                $detalle_punto->foto_norte = $nameN;
                $detalle_punto->foto_sur = $nameS;
                $detalle_punto->foto_este = $nameE;
                $detalle_punto->foto_oeste = $nameO;
                $detalle_punto->tipo_area = $request->area;
                $detalle_punto->tiempo = $request->time;
                $detalle_punto->emision_dominante = $request->emition;
                $detalle_punto->distancia_borde = $request->distancia_borde;
                $detalle_punto->ancho_via = $request->ancho_via;
                $detalle_punto->velocidad_promedio = $request->velocidad_prom;
                $detalle_punto->porcentaje_vehiculos_pesados = $request->porc_vehiculo_pes;
                $detalle_punto->estado_via = $request->est_via;
                $detalle_punto->trafico_diario_sentido_uno = isset($request->traf_uno) ? '1' : '0';
                $detalle_punto->trafico_diario_sentido_dos = isset($request->traf_dos) ? '1' : '0';
                $detalle_punto->tiempo_muestreo = $request->tiempo_muestreo;
                $detalle_punto->clima = $request->clima;
                $detalle_punto->tipo = $request->tipo;
                $detalle_punto->distancia_fuente = $request->distancia;
                $detalle_punto->direccion_grados = $request->dir_grados;
                $detalle_punto->fuente_evualuada = $request->fuent_eval;
                $detalle_punto->cercania_ciudades = $request->cerc_ciu;
                $detalle_punto->observaciones_punto_critico = $request->obs_cerc_ciu;
                $detalle_punto->distancia_cabecera_municipal = $request->dist_cab;
                $detalle_punto->observaciones_distancia_cabecera_municipal = $request->obs_dist_cab;
                $detalle_punto->cobertura_3g = $request->cob_3g;
                $detalle_punto->observaciones_cobertura_3g = $request->obs_cob_3g;
                $detalle_punto->tipo_acceso_unidad = $request->tipo_acces;
                $detalle_punto->observaciones_tipo_acceso = $request->obs_tipo_acces;
                $detalle_punto->horario_atencion = $request->hor_aten;
                $detalle_punto->observaciones_horario_atencion = $request->obs_hor_aten;
                $detalle_punto->distancia_punto_conexion = $request->dist_punt;
                $detalle_punto->observaciones_distancia_punto_conexion = $request->obs_dist_punt;
                $detalle_punto->distancia_estacion_servicio = $request->dist_est;
                $detalle_punto->observaciones_distancia_estacion_servicio = $request->obs_dist_est;
                $detalle_punto->tiempo_acceso_punto_monitoreo = $request->tim_acce;
                $detalle_punto->observaciones_tiempo_acceso_punto_monitoreo = $request->obs_tim_acce;
                $detalle_punto->condiciones_seguridad = $request->cond_seg;
                $detalle_punto->observaciones_condiciones_seguridad = $request->obs_cond_seg;
                $detalle_punto->condiciones_seguridad_checkbox = isset($request->cond_seg_check) ? '1' : '0';
                $detalle_punto->observaciones_condiciones_seguridad_checkbox = $request->obs_cond_seg_check;
                $detalle_punto->exposicion_sensores = isset($request->expo_tom_check) ? '1' : '0';
                $detalle_punto->observaciones_exposicion_sensores = $request->obs_no_exp_tom;
                $detalle_punto->condiciones_logistica = isset($request->cond_logis_check) ? '1' : '0';
                $detalle_punto->observaciones_condiciones_logistica = $request->obs_cond_logis_check;
                $detalle_punto->cercania_parqueadero = isset($request->cerc_parq_check) ? '1' : '0';
                $detalle_punto->observaciones_cercania_parqueadero = $request->obs_cerc_parq_check;
                $detalle_punto->cercania_carreteras_sin_pavimento = isset($request->cerc_carr_sin_check) ? '1' : '0';
                $detalle_punto->observaciones_cercania_carreteras_sin_pavimento = $request->obs_cerc_carr_sin;
                $detalle_punto->descripcion_contacto = $request->desc_contacto;
                $detalle_punto->nombre_contacto = $request->nom_contacto;
                $detalle_punto->celular_contacto = $request->cel_contacto;
                $detalle_punto->fijo_contacto = $request->fij_contacto;
                $detalle_punto->email_contacto = $request->email_contacto;
                $detalle_punto->save();
            });
            
            return redirect()->route('puntos-monitoreo.index', PuntoMonitoreo::find($id)->campana->id)->with('success', 'Punto de monitoreo actualizado satisfactoriamente');

        } else return redirect()->route('puntos-monitoreo.edit', $id)->with('failed', 'Ruta inválida, intenta de nuevo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puntoMonitoreo = PuntoMonitoreo::find($id);

        DB::transaction(function () use ($puntoMonitoreo){
            $puntoMonitoreo->detalle()->delete();
            $puntoMonitoreo->delete();
        });
        
        return redirect()->route('puntos-monitoreo.index', $puntoMonitoreo->campana->id)->with('success', 'Punto de monitoreo eliminado satisfactoriamente');
    }

    public function imprimir($id) 
    {
        $puntoMonitoreo = PuntoMonitoreo::find($id);
        return view('puntosMonitoreo.imprimir', compact('puntoMonitoreo'));
    }

    public function contaminantes($id) 
    {
        $puntoMonitoreo = PuntoMonitoreo::find($id);
        
        return view('puntosMonitoreo.contaminantes', compact('puntoMonitoreo'));
    }

    public function rangos(Request $request, $id) 
    {
        $puntoMonitoreo = PuntoMonitoreo::find($id);

        foreach ($request['contaminantes'] as $key => $value) {
            $puntoMonitoreo->contaminantes()->updateExistingPivot(
                $value, 
                [
                    'minimo' => $request['min'][$key], 
                    'maximo' => $request['max'][$key] 
                ]
            );
        }

        return redirect()->route('puntos-monitoreo.index', $puntoMonitoreo->campana->id)->with('success', 'Niveles actualizados satisfactoriamente');
    }

    public function modalCargaManual(PuntoMonitoreo $punto)
    {
        $archivos = array_filter(scandir($punto->ruta), function($archivo) { 
            return pathinfo($archivo, PATHINFO_EXTENSION) == 'dat';
        }); 

        return [
            'titulo' => $punto->alias, 
            'html' => view('puntosMonitoreo.cargaManual', compact('punto', 'archivos'))->render()
        ];
    }

    public function cargaDatos(PuntoMonitoreo $punto, Request $request)
    {     
        $nombre = $request->file->getClientOriginalName();
        $request->file->move($punto->ruta, $nombre);
    }

    public function recargarTablaDatos(PuntoMonitoreo $punto, $cantidad)
    {
        $archivos = array_filter(scandir($punto->ruta), function($archivo) { 
            return pathinfo($archivo, PATHINFO_EXTENSION) == 'dat';
        }); 

        return view('puntosMonitoreo.actualizacionTablaDatos', compact('archivos', 'cantidad'))->render();
    }

    public function cargaDatosBD(PuntoMonitoreo $punto, Request $request)
    {     

        $archivos = array_filter(scandir($punto->ruta), function($archivo) { 
            return pathinfo($archivo, PATHINFO_EXTENSION) == 'dat';
        }); 

        $punto->datos()->delete();

        foreach ($archivos as $item) {
            $nombre = explode('.', $item)[0];
            $data = utf8_encode(file_get_contents($punto->ruta.$item));
            $newstring = preg_replace("/[\n\r]/", "----------", $data);
            $content_array = explode("----------", $newstring);
            $column_name = explode(";", $content_array[2]);
            $col_seq = array();

            for ($i = 0; $i < count($column_name); $i++) {
                if ($column_name[$i] != '') {
                    $col_name = explode(",", $column_name[$i]);
                    if (isset($col_name[1]))
                        $col_seq[] = $col_name[1];
                    else
                        $col_seq[] = 'HHMM';
                }
            }

            $pm10 = array_search('PM10', $col_seq);
            if ($pm10 == '') $pm10 = '99';
            $pm25 = array_search('PM25', $col_seq);
            if ($pm25 == '') $pm25 = '99';
            $so2 = array_search('SO2', $col_seq);
            if ($so2 == '') $so2 = '99';
            $o3 = array_search('O3', $col_seq);
            if ($o3 == '') $o3 = '99';
            $co = array_search('CO', $col_seq);
            if ($co == '') $co = '99';
            $no = array_search('NO', $col_seq);
            if ($no == '') $no = '99';
            $no2 = array_search('NO2', $col_seq);
            if ($no2 == '') $no2 = '99';
            $nox = array_search('NOx', $col_seq);
            if ($nox == '') $nox = '99';
            $dv = array_search('DV', $col_seq);
            if ($dv == '') $dv = '99';
            $vv = array_search('VV', $col_seq);
            if ($vv == '') $vv = '99';
            $hr = array_search('HR', $col_seq);
            if ($hr == '') $hr = '99';
            $temp = array_search('TEMP', $col_seq);
            if ($temp == '') $temp = '99';
            $pb = array_search('PB', $col_seq);
            if ($pb == '') $pb = '99';
            $rs = array_search('RS', $col_seq);
            if ($rs == '') $rs = '99';
            $rain = array_search('RAIN', $col_seq);
            if ($rain == '') $rain = '99';
            $humedad = array_search('Humedad Int', $col_seq);
            if ($humedad == '') $humedad = '99';
            $temp2 = array_search('Temperatura Int', $col_seq);
            if ($temp2 == '') $temp2 = '99';
            $vel_aspiracion = array_search('Vel Aspiracion', $col_seq);
            if ($vel_aspiracion == '') $vel_aspiracion = '99';
            $tsp = array_search('TSP', $col_seq);
            if ($tsp == '') $tsp = '99';
            $estado_puerta = array_search('Estado Puerta', $col_seq);
            if ($estado_puerta == '') $estado_puerta = '99';
        
            for ($i = 3; $i < count($content_array); $i++) {
                if ($content_array[$i] != '') {
                    $content_array[$i] = preg_replace('/\s+/', ' ', $content_array[$i]);
                    $column_name = explode(" ", $content_array[$i]);
                    $column_name[99] = '';
                    $file_date = explode('.', $item); // 
                    $file_date1 = str_replace(' ', '', $file_date[0]);
                    $column_name[0] = str_replace(' ', '', $column_name[0]);
                    $column_name[0] = preg_replace('/\s+/', '', $column_name[0]);
                    $newtime = chunk_split($column_name[0], 2, ':');
                    $newdate = date('Y-m-d', strtotime($file_date1));
                    $newtime = $newtime . '00';
                    $datetime = $newdate . ' ' . $newtime;

                    $dato = new Dato;
                    $dato->punto_id = $punto->id;
                    $dato->fecha_hora = $datetime;
                    $dato->nombre_archivo = $file_date1;
                    $dato->pm10 = $column_name[$pm10]; 
                    $dato->pm25 = $column_name[$pm25]; 
                    $dato->tsp = $column_name[$tsp]; 
                    $dato->so2 = $column_name[$so2]; 
                    $dato->o3 = $column_name[$o3]; 
                    $dato->co = $column_name[$co]; 
                    $dato->no = $column_name[$no]; 
                    $dato->no2 = $column_name[$no2]; 
                    $dato->nox = $column_name[$nox]; 
                    $dato->dv = $column_name[$dv]; 
                    $dato->vv = $column_name[$vv]; 
                    $dato->hr = $column_name[$hr]; 
                    $dato->temp = $column_name[$temp]; 
                    $dato->pb = $column_name[$pb]; 
                    $dato->rs = $column_name[$rs]; 
                    $dato->rain = $column_name[$rain]; 
                    $dato->humedad = $column_name[$humedad]; 
                    $dato->temp2 = $column_name[$temp2]; 
                    $dato->vel_aspiracion = $column_name[$vel_aspiracion]; 
                    $dato->estado_puerta = $column_name[$estado_puerta]; 
                    $dato->save();
                }
            }
        }
    }
}
