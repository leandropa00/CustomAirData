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
                                    <h4 class="card-title">Editar estación</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="<?php echo e(route('estaciones.update', $estacion->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" class="form-control" value="<?php echo e($estacion->nombre); ?>" name="nombre" maxlength="30" minlength="3" placeholder="Ingrese un nombre para la estación" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-tag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Serial</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="number" value="<?php echo e($estacion->serial); ?>" class="form-control" name="serial" minlength="3" maxlength="30" placeholder="Ingrese un serial para la estación" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-hash"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Modelo</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" maxlength="50" value="<?php echo e($estacion->modelo); ?>" class="form-control" name="modelo" placeholder="Ingrese un modelo para la estación" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-info"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Fecha compra</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="date" value="<?php echo e($estacion->fecha_compra); ?>" class="form-control datepicker" name="fecha_compra"  placeholder="Ingrese la fecha de compra de la estación" required>
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
                                                                <textarea  id="notes" maxlength="100" class="form-control" name="observaciones" placeholder="Ingresa información adicional (opcional)"><?php echo e($estacion->observaciones); ?></textarea>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/estaciones/editar.blade.php ENDPATH**/ ?>