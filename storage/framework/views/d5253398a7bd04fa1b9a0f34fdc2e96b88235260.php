<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <?php if($message = Session::get('failed')): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                        
                    
                    <form class="form form-vertical" action="<?php echo e(route('puntos-monitoreo.store', $campana->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>        
                        <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                            <div class="card collapse-icon accordion-icon-rotate">
                                <div class="card-header">
                                    <h4 class="card-title">Crear un punto de monitoreo para <?php echo e($campana->nombre); ?></h4>
                                </div>
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
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Nombre del punto*</label>
                                                                            <input type="text" id="punto_name" class="form-control" name="punto_name" minlength="3" maxlength="30" placeholder="Ingrese un alias para el punto" required>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label>Estación*</label>
                                                                            <div>
                                                                                <select name="estacion_id" id="estacion_id" class="form-control select2" data-style="form-control" required>
                                                                                    <option value="">Selecciona una estación</option>
                                                                                    <?php $__currentLoopData = $estaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($estacion->id); ?>"><?php echo e(ucwords($estacion->nombre)); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="contact-info-icon">Ruta*</label>
                                                                            <div>
                                                                                <input maxlength="15" id="ruta" class="form-control" name="ruta" placeholder="Nombre de la carpeta en el servidor" required>
                                                                                <p class="text-muted ml-75 mt-50"><small>Ej: sim</small></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="contact-info-icon">Descripcion del punto</label>
                                                                            <div>
                                                                                <textarea maxlength="100"  id="notes" class="form-control" name="notes" placeholder="Descripción"></textarea>
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
                                                <div id="heading2" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion2" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Ubicación del punto*
                                                    </span>
                                                </div>
                                                <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading2" class="collapse">
                                                    <div class="form-body">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Departamento</label>
                                                                            <div>
                                                                                <select name="depto_name" class="form-control">
                                                                                    <option value="">Seleccione un departamento</option>
                                                                                    <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
        
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Municipio</label>
                                                                            <div>
                                                                                <select name="muni_name" class="form-control">
                                                                                    <option value="">Seleccione un departamento</option>
                                                                                    <?php $__currentLoopData = $municipios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="password-icon">Latitud*</label>
                                                                            <div>
                                                                                <input type="number"  step="any" id="coordA_name" class="form-control" name="coordA_name" minlength="3" maxlength="30" placeholder="Latitud" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
        
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Longitud*</label>
                                                                            <div>
                                                                                <input type="number" step="any" id="coordB_name" class="form-control" name="coordB_name" minlength="3" maxlength="30" placeholder="Longitud" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label>Dirección</label>
                                                                    <div>
                                                                        <textarea id="dir_name" class="form-control" name="dir_name" minlength="3" maxlength="60" rows="4" placeholder="Ingrese dirección"></textarea>
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
                                                                <div class="row">
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Foto norte</label>
                                                                            <div>
                                                                                <input type="file" id="photo_nort" name="photo_nort">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Foto sur</label>
                                                                            <div>
                                                                                <input type="file" id="photo_sur" name="photo_sur">
                                                                               
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <label>Foto este</label>
                                                                            <div>
                                                                                <input type="file" id="foto_este" name="foto_este">
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-md-12 col-12">
                                                                        <div class="form-group">
                                                                            <label for="password-icon">Foto oeste</label>
                                                                            <div>
                                                                                <input type="file" id="foto_oeste" name="foto_oeste">
                                                                             
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
                                                                            <label for="password-icon">Tipo de área</label>
                                                                            <div>
                                                                                <select name="area" id="area" class="form-control select2" data-style="form-control">
                                                                                    <option value="1">Urbana</option>
                                                                                    <option value="2">Suburbana</option>
                                                                                    <option value="3">Rural</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="password-icon">Tiempo</label>
                                                                            <div>
                                                                                <select name="time" id="time" class="form-control select2" data-style="form-control">
                                                                                    <option value="1">Fija</option>
                                                                                    <option value="2">Indicativa</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <label for="password-icon">Emisión dominante</label>
                                                                            <div>
                                                                                <select name="emition" id="emition" class="form-control select2" data-style="form-control">
                                                                                    <option value="1">Tráfico</option>
                                                                                    <option value="2">Punto crítico</option>
                                                                                    <option value="3">Industrial</option>
                                                                                    <option value="4">De fondo</option>
                                                                                </select>
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
                                                                                                            <label>Distancia al borde</label>
                                                                                                            <div>
                                                                                                                <input type="text" id="distancia_borde" class="form-control" name="distancia_borde" placeholder="metros" maxlength="100">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                    
                                                                                                    <div class="col-md-3 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Ancho de vía</label>
                                                                                                            <div>
                                                                                                                <input type="text" id="ancho_via" class="form-control" name="ancho_via" placeholder="metros" maxlength="10">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                    
                                                                                                    <div class="col-md-3 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Velocidad promedio</label>
                                                                                                            <div>
                                                                                                                <input type="text" id="velocidad_prom" class="form-control" name="velocidad_prom" placeholder="kms/h" maxlength="10">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                    
                                                                                                    <div class="col-md-3 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>% vehiculos pesados</label>
                                                                                                            <div>
                                                                                                                <input type="text" id="porc_vehiculo_pes" class="form-control" name="porc_vehiculo_pes" placeholder="%" maxlength="10">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-3 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Estado de la vía</label>
                                                                                                            <div>
                                                                                                                <select name="est_via" id="est_via" class="form-control select2" data-style="form-control">
                                                                                                                    <option value="Pavimentada">Pavimentada</option>
                                                                                                                    <option value="Destapada">Destapada</option>
                                                                                                                </select> 
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-3 col-12">
                                                                                                        <div class="form-check">
                                                                                                            <div class="form-check">
                                                                                                                <label></label>
                                                                                                                <div>
                                                                                                                    <input type="checkbox" id="traf_uno" name="traf_uno" value="0">
                                                                                                                    <label for="traf_uno"> Tráfico diaro sentido uno</label><br>
                                                                                                                    <input type="checkbox" id="traf_dos" name="traf_dos" value="1">
                                                                                                                    <label for="traf_dos"> Tráfico diario sentido dos</label><br>
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
                                                                                <div id="heading52" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion52" aria-expanded="false" aria-controls="accordion2">
                                                                                    <span class="lead collapse-title">
                                                                                        Indicativas
                                                                                    </span>
                                                                                </div>
                                                                                <div id="accordion52" role="tabpanel" data-parent="#accordionWrapa2" aria-labelledby="heading52" class="collapse">
                                                                                    <div class="card-content">
                                                                                        <div class="card-body">
                                                                                            <div class="row">
                                                                                                <div class="col-md-3 col-12">
                                                                                                    <div class="form-group">
                                                                                                        <label>Tiempo de muestreo</label>
                                                                                                        <div>
                                                                                                            <input type="text" id="tiempo_muestreo" class="form-control" name="tiempo_muestreo" placeholder="Días" maxlength="10">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                    
                                                                                                <div class="col-md-3 col-12">
                                                                                                    <div class="form-group">
                                                                                                        <label>Clima</label>
                                                                                                        <div>
                                                                                                            <select name="clima" id="clima" class="form-control select2" data-style="form-control">
                                                                                                                <option value="0">Seco</option>
                                                                                                                <option value="1">Humedo</option>
                                                                                                            </select> 
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
                                                                                                            <label>Tipo</label>
                                                                                                            <div>
                                                                                                                <input type="text" id="tipo" class="form-control" name="tipo" placeholder="Tipo" maxlength="20">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                        
                                                                                                    <div class="col-md-4 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Distancia de la fuente</label>
                                                                                                            <div>
                                                                                                                <input type="text" id="distancia" class="form-control" name="distancia" placeholder="Metros" maxlength="20">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>   
                                                                                                    <div class="col-md-4 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Dirección grados</label>
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <input type="text" id="dir_grados" class="form-control" name="dir_grados" placeholder="Dirección en grados" maxlength="10">
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
                                                                                                            <label>Fuente evaluada</label>
                                                                                                            <div>
                                                                                                                <select name="fuent_eval" id="fuent_eval" class="form-control select2" data-style="form-control">
                                                                                                                    <option value="">Selecciona una fuente evaluada</option>
                                                                                                                    <option value="1">Calle libre</option>
                                                                                                                    <option value="2">Calle encajonada</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                        
                                                                                                    <div class="col-md-4 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Cercania ciudades</label>
                                                                                                            <div>
                                                                                                                <select name="cerc_ciu" id="cerc_ciu" class="form-control select2" data-style="form-control">
                                                                                                                    <option value="">Selecciona cercania a ciudades</option>
                                                                                                                    <option value="1">Regionales</option>
                                                                                                                </select>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>   
                                                                                                    <div class="col-md-12 col-12">
                                                                                                        <div class="form-group">
                                                                                                            <label>Observación</label>
                                                                                                            <div>
                                                                                                                <div>
                                                                                                                    <input type="text" id="obs_cerc_ciu" maxlength="100" class="form-control" name="obs_cerc_ciu" placeholder="Observación">
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
                                                                                <label>Distancia a cabecera municipal.</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="dist_cab" maxlength="20" class="form-control" name="dist_cab" placeholder="kms">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_dist_cab" class="form-control" name="obs_dist_cab" placeholder="Observación"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>      
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <label>Cobertura 3G.</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="cob_3g" maxlength="25" class="form-control" name="cob_3g" placeholder="Empresa (Claro, Tigo, Movistar)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_cob_3g" class="form-control" name="obs_cob_3g" placeholder="Observación"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>      
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <label>Tipo de acceso para unidad móvil</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="tipo_acces" maxlength="25" class="form-control" name="tipo_acces" placeholder="(Destapado, Pavimento, otro)">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_tipo_acces" class="form-control" name="obs_tipo_acces" placeholder="Observación"></textarea>
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
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="hor_aten" maxlength="25" class="form-control" name="hor_aten" placeholder="Desde-hasta">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_hor_aten" class="form-control" name="obs_hor_aten" placeholder="Observación"></textarea>
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
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="dist_punt" maxlength="25" class="form-control" name="dist_punt" placeholder="Mts">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_dist_punt" class="form-control" name="obs_dist_punt" placeholder="Observación"></textarea>
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
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="dist_est" maxlength="25" class="form-control" name="dist_est" placeholder="Kmt">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_dist_est" class="form-control" name="obs_dist_est" placeholder="Observación"></textarea>
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
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="tim_acce" maxlength="25" class="form-control" name="tim_acce" placeholder="Minutos">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_tim_acce" class="form-control" name="obs_tim_acce" placeholder="Descripción"></textarea>
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
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="cond_seg" maxlength="25" class="form-control" name="cond_seg" placeholder="Si, no, cuales">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <div class="form-group">
                                                                            
                                                                            <div>
                                                                                <div>
                                                                                    <textarea maxlength="100"  id="obs_cond_seg" class="form-control" name="obs_cond_seg" placeholder="Observación"></textarea>
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
                                                                                <div class="custom-control custom-switch">
                                                                                    No
                                                                                    <input type="checkbox" class="custom-control-input" id="cond_seg_check" name="cond_seg_check">
                                                                                    <label class="custom-control-label" for="cond_seg_check"></label>Sí
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="obs_cond_seg_check" maxlength="100" class="form-control" name="obs_cond_seg_check" placeholder="Observación">
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
                                                                                <div class="custom-control custom-switch">
                                                                                    No
                                                                                    <input type="checkbox" class="custom-control-input" id="expo_tom_check" name="expo_tom_check">
                                                                                    <label class="custom-control-label" for="expo_tom_check"></label>Sí
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="obs_no_exp_tom" maxlength="100" class="form-control" name="obs_no_exp_tom" placeholder="Observación">
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
                                                                                <div class="custom-control custom-switch">
                                                                                    No
                                                                                    <input type="checkbox" class="custom-control-input" id="cond_logis_check" name="cond_logis_check">
                                                                                    <label class="custom-control-label" for="cond_logis_check"></label>Sí
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="obs_cond_logis_check" maxlength="100" class="form-control" name="obs_cond_logis_check" placeholder="Observación">
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
                                                                                <div class="custom-control custom-switch">
                                                                                    No
                                                                                    <input type="checkbox" class="custom-control-input" id="cerc_parq_check" name="cerc_parq_check">
                                                                                    <label class="custom-control-label" for="cerc_parq_check"></label>Sí
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="obs_cerc_parq_check" maxlength="100" class="form-control" name="obs_cerc_parq_check" placeholder="Observación">
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
                                                                                <div class="custom-control custom-switch">
                                                                                    No
                                                                                    <input type="checkbox" class="custom-control-input" id="cerc_carr_sin_check" name="cerc_carr_sin_check">
                                                                                    <label class="custom-control-label" for="cerc_carr_sin_check"></label>Sí
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <div>
                                                                                <div>
                                                                                    <input type="text" id="obs_cerc_carr_sin" maxlength="100" class="form-control" name="obs_cerc_carr_sin" placeholder="Observación">
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
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label>Descripción</label>
                                                                            <div>
                                                                                <input type="text" id="desc_contacto" class="form-control" name="desc_contacto" maxlength="60">
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label>Nombres</label>
                                                                            <div>
                                                                                <input type="text" id="nom_contacto" class="form-control" name="nom_contacto" maxlength="60">
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <label>Celular</label>
                                                                            <div>
                                                                                <input type="number" id="cel_contacto" class="form-control" name="cel_contacto" maxlength="20">
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <label>Fijo</label>
                                                                            <div>
                                                                                <input type="number" id="fij_contacto" class="form-control" name="fij_contacto" maxlength="20">
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <label>Email</label>
                                                                            <div>
                                                                                <input type="email" id="email_contacto" class="form-control" name="email_contacto" maxlength="60">
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
                                                                <?php $__currentLoopData = $contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="form-group col-md-2 col-6">
                                                                        <fieldset class="checkbox">
                                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                                <input class="checkbox_contaminantes" type="checkbox" name="contaminantes[]" value="<?php echo e($item->id); ?>">
                                                                                <span class="vs-checkbox">
                                                                                    <span class="vs-checkbox--check">
                                                                                        <i class="vs-icon feather icon-check"></i>
                                                                                    </span>
                                                                                </span>
                                                                                <span><?php echo e($item->nombre); ?></span>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/puntosMonitoreo/crear.blade.php ENDPATH**/ ?>