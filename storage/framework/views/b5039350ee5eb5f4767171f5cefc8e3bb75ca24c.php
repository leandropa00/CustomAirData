<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">
            <div class="content-header row"></div>
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
                                    <h4 class="card-title">Editando <?php echo e($empresa->nombre); ?></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                              
                                        <form class="form form-vertical" action="<?php echo e(route('empresas.update', $empresa->id)); ?>" method="POST">
                                            <input type="hidden" name="_method" value="PUt">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input minlength="3" type="text" class="form-control" name="nombre" autocomplete="nombre" value="<?php echo e($empresa->nombre); ?>" required placeholder="Ingresa el nombre de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>NIT</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="number" class="form-control" name="nit" autocomplete="nit" value="<?php echo e($empresa->nit); ?>" required placeholder="Ingresa el NIT de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-credit-card"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Teléfono</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input minlength="7" type="number" class="form-control" name="telefono" autocomplete="telefono" value="<?php echo e($empresa->telefono); ?>" required placeholder="Ingresa el teléfono de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-phone"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Correo</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" class="form-control" name="correo" autocomplete="correo" value="<?php echo e($empresa->correo); ?>" required placeholder="Ingresa el correo electrónico de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <div class="position-relative has-icon-left">
                                                                <textarea class="form-control" name="direccion" autocomplete="direccion" required placeholder="Ingresa la dirección de la empresa"><?php echo e($empresa->direccion); ?></textarea>
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-map-pin"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-12">
                                                        <button type="submit" id="submit_btn" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar</button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/empresas/editar.blade.php ENDPATH**/ ?>