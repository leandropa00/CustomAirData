<section id="basic-vertical-layouts">
    <input type="hidden" name="_method" value="PUT">
    <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
        <div class="card collapse-icon accordion-icon-rotate">
            <div class="card-content">
                <div class="card-body">
                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading1" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion1" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Datos básicos*
                                </span>
                            </div>
                            <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nombre del punto</label><br>
                                                        {{ $puntoMonitoreo->alias }}
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="contact-info-icon">Ruta</label><br>
                                                        {{ $puntoMonitoreo->ruta }}
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="contact-info-icon">Descripcion del punto</label><br>
                                                        {{ $puntoMonitoreo->detalle->descripcion ? $puntoMonitoreo->detalle->descripcion : '-' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading2" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion2" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Ubicación del punto*
                                </span>
                            </div>
                            <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading2" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Departamento</label><br>
                                                                {{$puntoMonitoreo->detalle->departamento ? $puntoMonitoreo->detalle->departamentoP->nombre : "-"}}
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Municipio</label><br>
                                                                {{$puntoMonitoreo->detalle->municipio ? $puntoMonitoreo->detalle->municipioP->nombre : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="password-icon">Latitud*</label><br>
                                                                {{ $puntoMonitoreo->latitud ? $puntoMonitoreo->latitud : '-'}}
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="password-icon">Longitud*</label><br>
                                                                {{ $puntoMonitoreo->longitud ? $puntoMonitoreo->longitud : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label>Dirección</label><br>
                                                        {{$puntoMonitoreo->detalle->direccion ? $puntoMonitoreo->detalle->direccion : '-'}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading3" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion3" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Fotos del punto
                                </span>
                            </div>
                            <div id="accordion3" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading3" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="form-body">
                                            <div class="col-12 col-md-12">

                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Foto norte</label><br>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <div>
                                                                @if ($puntoMonitoreo->detalle->foto_norte) 
                                                                    <img width="50%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_norte)}}">   
                                                                @else
                                                                    <b>No hay foto norte</b>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Foto sur</label><br>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <div>
                                                                @if ($puntoMonitoreo->detalle->foto_sur) 
                                                                    <img width="50%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_sur)}}">   
                                                                @else
                                                                    <b>No hay foto sur</b> 
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Foto este</label><br>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            @if ($puntoMonitoreo->detalle->foto_este) 
                                                                <img width="50%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_este)}}">   
                                                            @else
                                                                <b>No hay foto este</b>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="password-icon">Foto oeste</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            @if ($puntoMonitoreo->detalle->foto_oeste) 
                                                                <img width="50%" src="{{asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_oeste)}}">   
                                                            @else
                                                                <b>No hay foto oeste</b>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading4" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion4" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Niveles I a III
                                </span>
                            </div>
                            <div id="accordion4" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading4" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="password-icon">Tipo de área</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->tipo_area ? $puntoMonitoreo->detalle->tipo_area : '-'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="password-icon">Tiempo</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->tiempo ? $puntoMonitoreo->detalle->tiempo : '-'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="password-icon">Emisión dominante</label><br>
                                                        <div>
                                                            {{ $puntoMonitoreo->detalle->emision_dominante ? $puntoMonitoreo->detalle->emision_dominante : '-' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading5" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion5" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Nivel IV
                                </span>
                            </div>
                            <div id="accordion5" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading5" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div id="accordionWrapa2" role="tablist" aria-multiselectable="true">
                                            <div class="card collapse-icon accordion-icon-rotate">
                                                <div class="card-content">
                                                    <div class="card-body">

                                                        <div class="card collapse-header">
                                                            <div id="heading51" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion51" aria-expanded="false" aria-controls="accordion2">
                                                                <span class="lead collapse-title">
                                                                    Tráfico
                                                                </span>
                                                            </div>
                                                            <div id="accordion51" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading51" class="collapse">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-3 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Distancia al borde</label><br>
                                                                                        <div>
                                                                                            {{$puntoMonitoreo->detalle->distancia_borde ? $puntoMonitoreo->detalle->distancia_borde : '-' }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                
                                                                                <div class="col-md-3 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Ancho de vía</label><br>
                                                                                        <div>
                                                                                           {{$puntoMonitoreo->detalle->ancho_via ? $puntoMonitoreo->detalle->ancho_via : '-'}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                
                                                                                <div class="col-md-3 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Velocidad promedio</label><br>
                                                                                        <div>
                                                                                            {{$puntoMonitoreo->detalle->velocidad_promedio ? $puntoMonitoreo->detalle->velocidad_promedio : '-'}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                
                                                                                <div class="col-md-3 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>% vehiculos pesados</label><br>
                                                                                        <div>
                                                                                            {{$puntoMonitoreo->detalle->porcentaje_vehiculos_pesados ? $puntoMonitoreo->detalle->porcentaje_vehiculos_pesados : '-'}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-3 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Estado de la vía</label><br>
                                                                                        <div>
                                                                                            {{ $puntoMonitoreo->detalle->estado_via ? $puntoMonitoreo->detalle->estado_via : '-'}}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="traf_uno"> Tráfico diaro sentido uno</label><br>
                                                                                        {{ $puntoMonitoreo->detalle->trafico_diario_sentido_uno == '1' ? 'Sí' : 'No' }}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label for="traf_dos"> Tráfico diario sentido dos</label><br>
                                                                                        {{ $puntoMonitoreo->detalle->trafico_diario_sentido_dos == '1' ? 'Sí' : 'No' }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card collapse-header">
                                                            <div id="heading52" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion52" aria-expanded="false" aria-controls="accordion2">
                                                                <span class="lead collapse-title">
                                                                    Indicativas
                                                                </span>
                                                            </div>
                                                            <div id="accordion52" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading52" class="collapse">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label>Tiempo de muestreo</label><br>
                                                                                    <div>
                                                                                        {{$puntoMonitoreo->detalle->tiempo_muestreo ? $puntoMonitoreo->detalle->tiempo_muestreo : '-'}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label>Clima</label><br>
                                                                                    <div>
                                                                                        {{ $puntoMonitoreo->detalle->clima ? $puntoMonitoreo->detalle->clima : '-' }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card collapse-header">
                                                            <div id="heading53" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion53" aria-expanded="false" aria-controls="accordion2">
                                                                <span class="lead collapse-title">
                                                                    Industrial
                                                                </span>
                                                            </div>
                                                            <div id="accordion53" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading53" class="collapse">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Tipo</label><br>
                                                                                        <div>
                                                                                            {{ $puntoMonitoreo->detalle->tipo ? $puntoMonitoreo->detalle->tipo : '-' }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Distancia de la fuente</label><br>
                                                                                        <div>
                                                                                            {{ $puntoMonitoreo->detalle->distancia_fuente ? $puntoMonitoreo->detalle->distancia_fuente : '-' }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Dirección grados</label><br>
                                                                                        <div>
                                                                                            <div>
                                                                                                {{ $puntoMonitoreo->detalle->direccion_grados ? $puntoMonitoreo->detalle->direccion_grados : '-' }}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card collapse-header">
                                                            <div id="heading54" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion54" aria-expanded="false" aria-controls="accordion2">
                                                                <span class="lead collapse-title">
                                                                    Punto crítico/Rurales fondo
                                                                </span>
                                                            </div>
                                                            <div id="accordion54" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading54" class="collapse">
                                                                <div class="card-content">
                                                                    <div class="card-body">
                
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Fuente evaluada</label><br>
                                                                                        <div>
                                                                                            {{ $puntoMonitoreo->detalle->fuente_evualuada ? $puntoMonitoreo->detalle->fuente_evualuada : '-' }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
    
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Cercania ciudades</label><br>
                                                                                        <div>
                                                                                            {{ $puntoMonitoreo->detalle->cercania_ciudades ? $puntoMonitoreo->detalle->cercania_ciudades : '-' }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                                <div class="col-md-4 col-12">
                                                                                    <div class="form-group">
                                                                                        <label>Observación</label><br>
                                                                                        <div>
                                                                                            <div>
                                                                                                {{ $puntoMonitoreo->detalle->observaciones_punto_critico ? $puntoMonitoreo->detalle->observaciones_punto_critico : '-'}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>   
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading6" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion6" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Datos de logística
                                </span>
                            </div>
                            <div id="accordion6" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading6" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Distancia a cabecera municipal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->distancia_cabecera_municipal ? $puntoMonitoreo->detalle->distancia_cabecera_municipal : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_distancia_cabecera_municipal ? $puntoMonitoreo->detalle->observaciones_distancia_cabecera_municipal : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Cobertura 3G</label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->cobertura_3g ? $puntoMonitoreo->detalle->cobertura_3g : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_cobertura_3g ? $puntoMonitoreo->detalle->observaciones_cobertura_3g : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Tipo de acceso para unidad móvil</label><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->tipo_acceso_unidad ? $puntoMonitoreo->detalle->tipo_acceso_unidad : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_tipo_acceso ? $puntoMonitoreo->detalle->observaciones_tipo_acceso : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Horario de atención</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->horario_atencion ? $puntoMonitoreo->detalle->horario_atencion : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_horario_atencion ? $puntoMonitoreo->detalle->observaciones_horario_atencion : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Distancia al punto de conexión.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->distancia_punto_conexion ? $puntoMonitoreo->detalle->distancia_punto_conexion : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_distancia_punto_conexion ? $puntoMonitoreo->detalle->observaciones_distancia_punto_conexion : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Distancia a estación de servicio mas cercana.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->distancia_punto_conexion ? $puntoMonitoreo->detalle->distancia_punto_conexion : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_distancia_punto_conexion ? $puntoMonitoreo->detalle->observaciones_distancia_punto_conexion : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Tiempo de acceso al punto de monitoreo</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->tiempo_acceso_punto_monitoreo ? $puntoMonitoreo->detalle->tiempo_acceso_punto_monitoreo : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_tiempo_acceso_punto_monitoreo ? $puntoMonitoreo->detalle->observaciones_tiempo_acceso_punto_monitoreo : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Condiciones de seguridad</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->condiciones_seguridad ? $puntoMonitoreo->detalle->condiciones_seguridad : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_condiciones_seguridad ? $puntoMonitoreo->detalle->observaciones_condiciones_seguridad : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>      
                                            </div>
                                        </div>                                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading7" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion7" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Criterios de microlocalización
                                </span>
                            </div>
                            <div id="accordion7" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading7" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4 col-9">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Condiciones de seguridad.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            {{ $puntoMonitoreo->detalle->condiciones_seguridad_checkbox == '1' ? 'Sí' : 'No' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_condiciones_seguridad_checkbox ? $puntoMonitoreo->detalle->observaciones_condiciones_seguridad_checkbox : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-9">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Exposición de los toma-muestras y sensores.</label>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-2 col-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            {{ $puntoMonitoreo->detalle->exposicion_sensores == '1' ? 'Sí' : 'No' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_exposicion_sensores ? $puntoMonitoreo->detalle->observaciones_exposicion_sensores : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="col-md-4 col-9">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Condiciones de logistica</label>
                                                        </div>
                                                    </div>
                                                </div>   

                                                <div class="col-md-2 col-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            {{ $puntoMonitoreo->detalle->condiciones_logistica == '1' ? 'Sí' : 'No' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>   
                                                                {{$puntoMonitoreo->detalle->observaciones_condiciones_logistica ? $puntoMonitoreo->detalle->observaciones_condiciones_logistica : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-4 col-9">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Cercanía a zona de parqueo, depósitos de químicos, o de combustible.</label>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-2 col-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            {{ $puntoMonitoreo->detalle->cercania_parqueadero == '1' ? 'Sí' : 'No'}}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_cercania_parqueadero ? $puntoMonitoreo->detalle->observaciones_cercania_parqueadero : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-4 col-9">
                                                    <div class="form-group">
                                                        <div>
                                                            <label>Cercanía de carreteras sin pavimento, campos deportivos, lotes sin vegetación 
                                                                que los cubra o cualquier fuente emisora de material.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>   
                                                <div class="col-md-2 col-3">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            {{ $puntoMonitoreo->detalle->cercania_carreteras_sin_pavimento == '1' ? 'Sí' : 'No' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <div>
                                                            <div>
                                                                {{$puntoMonitoreo->detalle->observaciones_cercania_carreteras_sin_pavimento ? $puntoMonitoreo->detalle->observaciones_cercania_carreteras_sin_pavimento : '-'}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading8" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion8" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Personal de contacto
                                </span>
                            </div>
                            <div id="accordion8" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading8" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Nombres</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->nombre_contacto ? $puntoMonitoreo->detalle->nombre_contacto : '-'}}
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Celular</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->celular_contacto ? $puntoMonitoreo->detalle->celular_contacto : '-'}}
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Fijo</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->fijo_contacto ? $puntoMonitoreo->detalle->fijo_contacto : '-'}}
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Correo</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->email_contacto ? $puntoMonitoreo->detalle->email_contacto : '-'}}
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label>Descripción</label><br>
                                                        <div>
                                                            {{$puntoMonitoreo->detalle->descripcion_contacto ? $puntoMonitoreo->detalle->descripcion_contacto : '-'}}
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="accordion-default collapse-bordered">
                        <div class="card collapse-header">
                            <div id="heading9" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion9" aria-expanded="false" aria-controls="accordion1">
                                <span class="lead collapse-title">
                                    Contaminantes*
                                </span>
                            </div>
                            <div id="accordion9" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading8" class="collapse">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($puntoMonitoreo->contaminantes as $item)
                                                <div class="form-group col-md-2 col-6">
                                                    {{$item->nombre}}
                                                </div>
                                            @endforeach 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>