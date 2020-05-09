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

                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear campaña</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="<?php echo e(route('campanas.store')); ?>" method="POST" >
                                            <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" maxlength="30" class="form-control" name="nombre" minlength="3" placeholder="Ingrese un nombre para la estación" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-tag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Empresa</label>
                                                            <div class="position-relative has-icon-left">
                                                                <select name="empresa_id" class="form-control">
                                                                    <?php $__empty_1 = true; $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nombre); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <option>No hay empresas creadas</option>   
                                                                    <?php endif; ?>
                                                                </select>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-home"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Fecha inicio</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="date" class="form-control datepicker" name="fecha_inicio"  placeholder="Ingrese la fecha de inicio de la campaña" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Fecha fin</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="date" class="form-control datepicker" name="fecha_fin"  placeholder="Ingrese la fecha de finalización de la campaña" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-calendar"></i>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="password-icon">Observaciones</label>
                                                            <div class="position-relative has-icon-left">
                                                                <textarea  id="notes" maxlength="100" class="form-control" name="observaciones" placeholder="Ingresa información adicional (opcional)"></textarea>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-clipboard"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/campanas/crear.blade.php ENDPATH**/ ?>