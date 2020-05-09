<title>{{ $puntoMonitoreo->alias.' - '.$puntoMonitoreo->campana->nombre.' - '.$puntoMonitoreo->campana->empresa->nombre }}</title>

DATOS BÁSICOS <br>

Nombre del punto: 
{{ $puntoMonitoreo->alias }} <br>

Ruta: 
{{ $puntoMonitoreo->ruta }} <br>

Descripcion del punto: 
{{ $puntoMonitoreo->detalle->descripcion ? $puntoMonitoreo->detalle->descripcion : '-' }} <br>

<hr>
           
UBICACIÓN DEL PUNTO <br>

Departamento: 
{{$puntoMonitoreo->detalle->departamento ? $puntoMonitoreo->detalle->departamentoP->nombre : "-"}} <br>

Municipio: 
{{$puntoMonitoreo->detalle->municipio ? $puntoMonitoreo->detalle->municipioP->nombre : '-' }} <br>
      
Latitud: 
{{ $puntoMonitoreo->latitud ? $puntoMonitoreo->latitud : '-'}} <br>

Longitud: 
{{ $puntoMonitoreo->longitud ? $puntoMonitoreo->longitud : '-' }} <br>
    
Dirección: 
{{$puntoMonitoreo->detalle->direccion ? $puntoMonitoreo->detalle->direccion : '-'}} <br>

<hr>
                
FOTOS DEL PUNTO <br>

Foto norte: 
@if ($puntoMonitoreo->detalle->foto_norte) 
    <br><img width="100%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_norte)}}"><br>   
@else
    No hay foto norte
@endif
<br>

Foto sur: 
@if ($puntoMonitoreo->detalle->foto_sur) 
    <br><img width="100%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_sur)}}"><br>   
@else
    No hay foto sur
@endif
<br>

Foto este: 
@if ($puntoMonitoreo->detalle->foto_este) 
    <br><img width="100%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_este)}}"><br>   
@else
    No hay foto este
@endif
<br>

Foto oeste: 
@if ($puntoMonitoreo->detalle->foto_oeste) 
    <br><img width="100%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_oeste)}}"><br>   
@else
    No hay foto oeste
@endif
<br>

<hr>

NIVELES I A III <br>
                          
Tipo de área: 
{{$puntoMonitoreo->detalle->tipo_area ? $puntoMonitoreo->detalle->tipo_area : '-'}} <br>

Tiempo: 
{{$puntoMonitoreo->detalle->tiempo ? $puntoMonitoreo->detalle->tiempo : '-'}} <br>

Emisión dominante: 
{{ $puntoMonitoreo->detalle->emision_dominante ? $puntoMonitoreo->detalle->emision_dominante : '-' }} <br>

<hr>

NIVEL IV <br>

Tráfico <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia al borde: 
{{$puntoMonitoreo->detalle->distancia_borde ? $puntoMonitoreo->detalle->distancia_borde : '-' }} <br>
                                                                                        
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ancho de vía: 
{{$puntoMonitoreo->detalle->ancho_via ? $puntoMonitoreo->detalle->ancho_via : '-'}} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Velocidad promedio: 
{{$puntoMonitoreo->detalle->velocidad_promedio ? $puntoMonitoreo->detalle->velocidad_promedio : '-'}} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;% vehiculos pesados: 
{{$puntoMonitoreo->detalle->porcentaje_vehiculos_pesados ? $puntoMonitoreo->detalle->porcentaje_vehiculos_pesados : '-'}} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado de la vía: 
{{ $puntoMonitoreo->detalle->estado_via ? $puntoMonitoreo->detalle->estado_via : '-'}} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tráfico diaro sentido uno: 
{{ $puntoMonitoreo->detalle->trafico_diario_sentido_uno == '1' ? 'Sí' : 'No' }} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tráfico diario sentido dos: 
{{ $puntoMonitoreo->detalle->trafico_diario_sentido_dos == '1' ? 'Sí' : 'No' }} <br>
                

Indicativas <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiempo de muestreo: 
{{$puntoMonitoreo->detalle->tiempo_muestreo ? $puntoMonitoreo->detalle->tiempo_muestreo : '-'}} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clima: 
{{ $puntoMonitoreo->detalle->clima ? $puntoMonitoreo->detalle->clima : '-' }} <br>
                                                                                    

Industrial <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo: 
{{ $puntoMonitoreo->detalle->tipo ? $puntoMonitoreo->detalle->tipo : '-' }} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia de la fuente: 
{{ $puntoMonitoreo->detalle->distancia_fuente ? $puntoMonitoreo->detalle->distancia_fuente : '-' }} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección grados: 
{{ $puntoMonitoreo->detalle->direccion_grados ? $puntoMonitoreo->detalle->direccion_grados : '-' }} <br>
                                                                
Punto crítico/Rurales fondo <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fuente evaluada: 
{{ $puntoMonitoreo->detalle->fuente_evualuada ? $puntoMonitoreo->detalle->fuente_evualuada : '-' }}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cercania ciudades: 
{{ $puntoMonitoreo->detalle->cercania_ciudades ? $puntoMonitoreo->detalle->cercania_ciudades : '-' }}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación: 
{{ $puntoMonitoreo->detalle->observaciones_punto_critico ? $puntoMonitoreo->detalle->observaciones_punto_critico : '-'}}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia a cabecera municipal: 
{{$puntoMonitoreo->detalle->distancia_cabecera_municipal ? $puntoMonitoreo->detalle->distancia_cabecera_municipal : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_distancia_cabecera_municipal ? $puntoMonitoreo->detalle->observaciones_distancia_cabecera_municipal : '-' }}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cobertura 3G: 
{{$puntoMonitoreo->detalle->cobertura_3g ? $puntoMonitoreo->detalle->cobertura_3g : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_cobertura_3g ? $puntoMonitoreo->detalle->observaciones_cobertura_3g : '-'}}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de acceso para unidad móvil: 
{{$puntoMonitoreo->detalle->tipo_acceso_unidad ? $puntoMonitoreo->detalle->tipo_acceso_unidad : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_tipo_acceso ? $puntoMonitoreo->detalle->observaciones_tipo_acceso : '-'}}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Horario de atención: 
{{$puntoMonitoreo->detalle->horario_atencion ? $puntoMonitoreo->detalle->horario_atencion : '-' }}. 
{{$puntoMonitoreo->detalle->observaciones_horario_atencion ? $puntoMonitoreo->detalle->observaciones_horario_atencion : '-'}}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia al punto de conexión: 
{{$puntoMonitoreo->detalle->distancia_punto_conexion ? $puntoMonitoreo->detalle->distancia_punto_conexion : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_distancia_punto_conexion ? $puntoMonitoreo->detalle->observaciones_distancia_punto_conexion : '-'}}<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia a estación de servicio mas cercana: 
{{$puntoMonitoreo->detalle->distancia_punto_conexion ? $puntoMonitoreo->detalle->distancia_punto_conexion : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_distancia_punto_conexion ? $puntoMonitoreo->detalle->observaciones_distancia_punto_conexion : '-'}}<br>
                                                         
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiempo de acceso al punto de monitoreo:                                                    
{{$puntoMonitoreo->detalle->tiempo_acceso_punto_monitoreo ? $puntoMonitoreo->detalle->tiempo_acceso_punto_monitoreo : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_tiempo_acceso_punto_monitoreo ? $puntoMonitoreo->detalle->observaciones_tiempo_acceso_punto_monitoreo : '-'}} <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Condiciones de seguridad: 
{{$puntoMonitoreo->detalle->condiciones_seguridad ? $puntoMonitoreo->detalle->condiciones_seguridad : '-'}}. 
{{$puntoMonitoreo->detalle->observaciones_condiciones_seguridad ? $puntoMonitoreo->detalle->observaciones_condiciones_seguridad : '-'}} <br>
  
<hr>

CRITERIOS DE MICROLOCALIZACIÓN<br>

Condiciones de seguridad: 
{{ $puntoMonitoreo->detalle->condiciones_seguridad_checkbox == '1' ? 'Sí' : 'No' }}. 
{{$puntoMonitoreo->detalle->observaciones_condiciones_seguridad_checkbox ? $puntoMonitoreo->detalle->observaciones_condiciones_seguridad_checkbox : '-'}}<br>

Exposición de los toma-muestras y sensores: 
{{ $puntoMonitoreo->detalle->exposicion_sensores == '1' ? 'Sí' : 'No' }}. 
{{$puntoMonitoreo->detalle->observaciones_exposicion_sensores ? $puntoMonitoreo->detalle->observaciones_exposicion_sensores : '-'}}<br>

Condiciones de logistica: 
{{ $puntoMonitoreo->detalle->condiciones_logistica == '1' ? 'Sí' : 'No' }}. 
{{$puntoMonitoreo->detalle->observaciones_condiciones_logistica ? $puntoMonitoreo->detalle->observaciones_condiciones_logistica : '-'}}<br>

Cercanía a zona de parqueo, depósitos de químicos, o de combustible: 
{{ $puntoMonitoreo->detalle->cercania_parqueadero == '1' ? 'Sí' : 'No'}}. 
{{$puntoMonitoreo->detalle->observaciones_cercania_parqueadero ? $puntoMonitoreo->detalle->observaciones_cercania_parqueadero : '-'}}<br>

Cercanía de carreteras sin pavimento, campos deportivos, lotes sin vegetación que los cubra o cualquier fuente emisora de material: 
{{ $puntoMonitoreo->detalle->cercania_carreteras_sin_pavimento == '1' ? 'Sí' : 'No' }}. 
{{$puntoMonitoreo->detalle->observaciones_cercania_carreteras_sin_pavimento ? $puntoMonitoreo->detalle->observaciones_cercania_carreteras_sin_pavimento : '-'}}<br>

<hr>

PERSONAL DE CONTACTO<br>

Nombres: 
{{$puntoMonitoreo->detalle->nombre_contacto ? $puntoMonitoreo->detalle->nombre_contacto : '-'}} <br>

Celular: 
{{$puntoMonitoreo->detalle->celular_contacto ? $puntoMonitoreo->detalle->celular_contacto : '-'}} <br>

Fijo: 
{{$puntoMonitoreo->detalle->fijo_contacto ? $puntoMonitoreo->detalle->fijo_contacto : '-'}} <br>

Correo: 
{{$puntoMonitoreo->detalle->email_contacto ? $puntoMonitoreo->detalle->email_contacto : '-'}} <br>

Descripción: 
{{$puntoMonitoreo->detalle->descripcion_contacto ? $puntoMonitoreo->detalle->descripcion_contacto : '-'}} <br>
                                                     
<hr>

CONTAMINANTES <br>

@foreach ($puntoMonitoreo->contaminantes as $item)
    {{$item->nombre}}, 
@endforeach

<script>
    print();
</script>