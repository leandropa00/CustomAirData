<title><?php echo e($puntoMonitoreo->alias.' - '.$puntoMonitoreo->campana->nombre.' - '.$puntoMonitoreo->campana->empresa->nombre); ?></title>

DATOS BÁSICOS <br>

Nombre del punto: 
<?php echo e($puntoMonitoreo->alias); ?> <br>

Ruta: 
<?php echo e($puntoMonitoreo->ruta); ?> <br>

Descripcion del punto: 
<?php echo e($puntoMonitoreo->detalle->descripcion ? $puntoMonitoreo->detalle->descripcion : '-'); ?> <br>

<hr>
           
UBICACIÓN DEL PUNTO <br>

Departamento: 
<?php echo e($puntoMonitoreo->detalle->departamento ? $puntoMonitoreo->detalle->departamentoP->nombre : "-"); ?> <br>

Municipio: 
<?php echo e($puntoMonitoreo->detalle->municipio ? $puntoMonitoreo->detalle->municipioP->nombre : '-'); ?> <br>
      
Latitud: 
<?php echo e($puntoMonitoreo->latitud ? $puntoMonitoreo->latitud : '-'); ?> <br>

Longitud: 
<?php echo e($puntoMonitoreo->longitud ? $puntoMonitoreo->longitud : '-'); ?> <br>
    
Dirección: 
<?php echo e($puntoMonitoreo->detalle->direccion ? $puntoMonitoreo->detalle->direccion : '-'); ?> <br>

<hr>
                
FOTOS DEL PUNTO <br>

Foto norte: 
<?php if($puntoMonitoreo->detalle->foto_norte): ?> 
    <br><img width="100%" src="<?php echo e(asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_norte)); ?>"><br>   
<?php else: ?>
    No hay foto norte
<?php endif; ?>
<br>

Foto sur: 
<?php if($puntoMonitoreo->detalle->foto_sur): ?> 
    <br><img width="100%" src="<?php echo e(asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_sur)); ?>"><br>   
<?php else: ?>
    No hay foto sur
<?php endif; ?>
<br>

Foto este: 
<?php if($puntoMonitoreo->detalle->foto_este): ?> 
    <br><img width="100%" src="<?php echo e(asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_este)); ?>"><br>   
<?php else: ?>
    No hay foto este
<?php endif; ?>
<br>

Foto oeste: 
<?php if($puntoMonitoreo->detalle->foto_oeste): ?> 
    <br><img width="100%" src="<?php echo e(asset('images/puntos_monitoreo/'.$puntoMonitoreo->detalle->foto_oeste)); ?>"><br>   
<?php else: ?>
    No hay foto oeste
<?php endif; ?>
<br>

<hr>

NIVELES I A III <br>
                          
Tipo de área: 
<?php echo e($puntoMonitoreo->detalle->tipo_area ? $puntoMonitoreo->detalle->tipo_area : '-'); ?> <br>

Tiempo: 
<?php echo e($puntoMonitoreo->detalle->tiempo ? $puntoMonitoreo->detalle->tiempo : '-'); ?> <br>

Emisión dominante: 
<?php echo e($puntoMonitoreo->detalle->emision_dominante ? $puntoMonitoreo->detalle->emision_dominante : '-'); ?> <br>

<hr>

NIVEL IV <br>

Tráfico <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia al borde: 
<?php echo e($puntoMonitoreo->detalle->distancia_borde ? $puntoMonitoreo->detalle->distancia_borde : '-'); ?> <br>
                                                                                        
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ancho de vía: 
<?php echo e($puntoMonitoreo->detalle->ancho_via ? $puntoMonitoreo->detalle->ancho_via : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Velocidad promedio: 
<?php echo e($puntoMonitoreo->detalle->velocidad_promedio ? $puntoMonitoreo->detalle->velocidad_promedio : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;% vehiculos pesados: 
<?php echo e($puntoMonitoreo->detalle->porcentaje_vehiculos_pesados ? $puntoMonitoreo->detalle->porcentaje_vehiculos_pesados : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado de la vía: 
<?php echo e($puntoMonitoreo->detalle->estado_via ? $puntoMonitoreo->detalle->estado_via : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tráfico diaro sentido uno: 
<?php echo e($puntoMonitoreo->detalle->trafico_diario_sentido_uno == '1' ? 'Sí' : 'No'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tráfico diario sentido dos: 
<?php echo e($puntoMonitoreo->detalle->trafico_diario_sentido_dos == '1' ? 'Sí' : 'No'); ?> <br>
                

Indicativas <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiempo de muestreo: 
<?php echo e($puntoMonitoreo->detalle->tiempo_muestreo ? $puntoMonitoreo->detalle->tiempo_muestreo : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clima: 
<?php echo e($puntoMonitoreo->detalle->clima ? $puntoMonitoreo->detalle->clima : '-'); ?> <br>
                                                                                    

Industrial <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo: 
<?php echo e($puntoMonitoreo->detalle->tipo ? $puntoMonitoreo->detalle->tipo : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia de la fuente: 
<?php echo e($puntoMonitoreo->detalle->distancia_fuente ? $puntoMonitoreo->detalle->distancia_fuente : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección grados: 
<?php echo e($puntoMonitoreo->detalle->direccion_grados ? $puntoMonitoreo->detalle->direccion_grados : '-'); ?> <br>
                                                                
Punto crítico/Rurales fondo <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fuente evaluada: 
<?php echo e($puntoMonitoreo->detalle->fuente_evualuada ? $puntoMonitoreo->detalle->fuente_evualuada : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cercania ciudades: 
<?php echo e($puntoMonitoreo->detalle->cercania_ciudades ? $puntoMonitoreo->detalle->cercania_ciudades : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Observación: 
<?php echo e($puntoMonitoreo->detalle->observaciones_punto_critico ? $puntoMonitoreo->detalle->observaciones_punto_critico : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia a cabecera municipal: 
<?php echo e($puntoMonitoreo->detalle->distancia_cabecera_municipal ? $puntoMonitoreo->detalle->distancia_cabecera_municipal : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_distancia_cabecera_municipal ? $puntoMonitoreo->detalle->observaciones_distancia_cabecera_municipal : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cobertura 3G: 
<?php echo e($puntoMonitoreo->detalle->cobertura_3g ? $puntoMonitoreo->detalle->cobertura_3g : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_cobertura_3g ? $puntoMonitoreo->detalle->observaciones_cobertura_3g : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de acceso para unidad móvil: 
<?php echo e($puntoMonitoreo->detalle->tipo_acceso_unidad ? $puntoMonitoreo->detalle->tipo_acceso_unidad : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_tipo_acceso ? $puntoMonitoreo->detalle->observaciones_tipo_acceso : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Horario de atención: 
<?php echo e($puntoMonitoreo->detalle->horario_atencion ? $puntoMonitoreo->detalle->horario_atencion : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_horario_atencion ? $puntoMonitoreo->detalle->observaciones_horario_atencion : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia al punto de conexión: 
<?php echo e($puntoMonitoreo->detalle->distancia_punto_conexion ? $puntoMonitoreo->detalle->distancia_punto_conexion : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_distancia_punto_conexion ? $puntoMonitoreo->detalle->observaciones_distancia_punto_conexion : '-'); ?><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Distancia a estación de servicio mas cercana: 
<?php echo e($puntoMonitoreo->detalle->distancia_punto_conexion ? $puntoMonitoreo->detalle->distancia_punto_conexion : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_distancia_punto_conexion ? $puntoMonitoreo->detalle->observaciones_distancia_punto_conexion : '-'); ?><br>
                                                         
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tiempo de acceso al punto de monitoreo:                                                    
<?php echo e($puntoMonitoreo->detalle->tiempo_acceso_punto_monitoreo ? $puntoMonitoreo->detalle->tiempo_acceso_punto_monitoreo : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_tiempo_acceso_punto_monitoreo ? $puntoMonitoreo->detalle->observaciones_tiempo_acceso_punto_monitoreo : '-'); ?> <br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Condiciones de seguridad: 
<?php echo e($puntoMonitoreo->detalle->condiciones_seguridad ? $puntoMonitoreo->detalle->condiciones_seguridad : '-'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_condiciones_seguridad ? $puntoMonitoreo->detalle->observaciones_condiciones_seguridad : '-'); ?> <br>
  
<hr>

CRITERIOS DE MICROLOCALIZACIÓN<br>

Condiciones de seguridad: 
<?php echo e($puntoMonitoreo->detalle->condiciones_seguridad_checkbox == '1' ? 'Sí' : 'No'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_condiciones_seguridad_checkbox ? $puntoMonitoreo->detalle->observaciones_condiciones_seguridad_checkbox : '-'); ?><br>

Exposición de los toma-muestras y sensores: 
<?php echo e($puntoMonitoreo->detalle->exposicion_sensores == '1' ? 'Sí' : 'No'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_exposicion_sensores ? $puntoMonitoreo->detalle->observaciones_exposicion_sensores : '-'); ?><br>

Condiciones de logistica: 
<?php echo e($puntoMonitoreo->detalle->condiciones_logistica == '1' ? 'Sí' : 'No'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_condiciones_logistica ? $puntoMonitoreo->detalle->observaciones_condiciones_logistica : '-'); ?><br>

Cercanía a zona de parqueo, depósitos de químicos, o de combustible: 
<?php echo e($puntoMonitoreo->detalle->cercania_parqueadero == '1' ? 'Sí' : 'No'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_cercania_parqueadero ? $puntoMonitoreo->detalle->observaciones_cercania_parqueadero : '-'); ?><br>

Cercanía de carreteras sin pavimento, campos deportivos, lotes sin vegetación que los cubra o cualquier fuente emisora de material: 
<?php echo e($puntoMonitoreo->detalle->cercania_carreteras_sin_pavimento == '1' ? 'Sí' : 'No'); ?>. 
<?php echo e($puntoMonitoreo->detalle->observaciones_cercania_carreteras_sin_pavimento ? $puntoMonitoreo->detalle->observaciones_cercania_carreteras_sin_pavimento : '-'); ?><br>

<hr>

PERSONAL DE CONTACTO<br>

Nombres: 
<?php echo e($puntoMonitoreo->detalle->nombre_contacto ? $puntoMonitoreo->detalle->nombre_contacto : '-'); ?> <br>

Celular: 
<?php echo e($puntoMonitoreo->detalle->celular_contacto ? $puntoMonitoreo->detalle->celular_contacto : '-'); ?> <br>

Fijo: 
<?php echo e($puntoMonitoreo->detalle->fijo_contacto ? $puntoMonitoreo->detalle->fijo_contacto : '-'); ?> <br>

Correo: 
<?php echo e($puntoMonitoreo->detalle->email_contacto ? $puntoMonitoreo->detalle->email_contacto : '-'); ?> <br>

Descripción: 
<?php echo e($puntoMonitoreo->detalle->descripcion_contacto ? $puntoMonitoreo->detalle->descripcion_contacto : '-'); ?> <br>
                                                     
<hr>

CONTAMINANTES <br>

<?php $__currentLoopData = $puntoMonitoreo->contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($item->nombre); ?>, 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
    print();
</script><?php /**PATH /Applications/AMPPS/www/customair/resources/views/puntosMonitoreo/imprimir.blade.php ENDPATH**/ ?>