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
                                    <h4 class="card-title">Crear estación</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="<?php echo e(route('submit.submit-add-locaton.post')); ?>" method="POST" >
                                            <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" id="location_name" class="form-control" name="location_name" minlength="3" placeholder="Ingrese un nombre para la estación" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-tag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
         
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Ruta en el servidor</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" id="server_path" class="form-control" name="server_path" placeholder="Ingrese la ruta de archivos en el servidor" required>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-navigation"></i>
                                                                </div>
                                                                <p class="text-muted ml-75 mt-50"><small>Ej:/home/logjanec/public_html/</small></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="password-icon">Notas</label>
                                                            <div class="position-relative has-icon-left">
                                                                <textarea  id="notes" class="form-control" name="notes" placeholder="Ingresa información adicional (opcional)"></textarea>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-clipboard"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <h4 class="card-title">Contaminantes</h4>
                                                    </div>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/estaciones/crear.blade.php ENDPATH**/ ?>