<?php $__env->startSection('content'); ?>
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
                                    <h4 class="card-title">Crear empresa</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                              
                                        <form class="form form-vertical"method="POST" action="<?php echo e(route('empresas.store')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input minlength="3" maxlength="50" type="text" class="form-control" name="nombre" autocomplete="nombre" required placeholder="Ingresa el nombre de la empresa">
                                                                
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
                                                                <input type="number" class="form-control" name="nit" autocomplete="nit" required placeholder="Ingresa el NIT de la empresa">
                                                                
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
                                                                <input minlength="7" maxlength="20" type="number" class="form-control" name="telefono" autocomplete="telefono" required placeholder="Ingresa el teléfono de la empresa">
                                                                
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
                                                                <input maxlength="30" type="email" class="form-control" name="correo" autocomplete="correo" required placeholder="Ingresa el correo electrónico de la empresa" >
                                                                
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
                                                                <textarea class="form-control" name="direccion" autocomplete="direccion" required placeholder="Ingresa la dirección de la empresa"></textarea>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-map-pin"></i>
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
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/empresas/crear.blade.php ENDPATH**/ ?>