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
                                    <h4 class="card-title">Actualizar cliente</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="<?php echo e(route('submit.submit-edit-user.post')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="text" id="name" class="form-control" value="<?php echo e($edit_user->name); ?>" name="name" placeholder="Ingresa el nombre del cliente" required>
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Correo electrónico</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="email" id="email" class="form-control" value="<?php echo e($edit_user->email); ?>" name="email" placeholder="Ingresa el correo electrónico" required>
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <input type="hidden" id="id" class="form-control" name="id" value="<?php echo e($edit_user->id); ?>" >
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar</button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/edit_user.blade.php ENDPATH**/ ?>