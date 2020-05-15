<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <?php if($message = Session::get('success')): ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?php echo e($message); ?></strong>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Listado de usuarios</h4>
                            <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-outline-warning">Crear un nuevo usuario</a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Recibe mensajes</th>
                                                    <?php if(Auth::user()->rol=='admin'): ?>
                                                    <th>Empresa</th>
                                                    <th>Rol</th>
                                                    <?php endif; ?>
                                                    <th>Fecha de creación</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $users_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                  <tr>
                                                    <td><?php echo e(ucwords($data->name)); ?></td>
                                                    <td><?php echo e($data->email); ?></td>
                                                    <td><?php echo e($data->telefono); ?></td>
                                                    <td>
                                                        <select onchange="cambiarPermisosSms(<?php echo e($data->id); ?>, this.value)" class="form-control">
                                                            <option value="0" <?php if($data->recibe_mensajes == 0): ?> selected <?php endif; ?>>No</option>
                                                            <option value="1" <?php if($data->recibe_mensajes == 1): ?> selected <?php endif; ?>>Sí</option>
                                                        </select>
                                                    </td>
                                                    <?php if(Auth::user()->rol=='admin'): ?>
                                                        <td><?php echo e(ucfirst($data->empresa->nombre)); ?></td>
                                                        <td><?php echo e(ucfirst($data->rol)); ?></td>
                                                    <?php endif; ?>
                                                    <td><?php echo e(carbon\Carbon::parse($data->created_at)->format('d-m-Y g:i A')); ?></td>
                                                    <td>
                                                        <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="<?php echo e(route('users.edit', $data->id)); ?>"><i class="feather icon-edit"></i></a>
                                                        <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="<?php echo e(route('users.destroy', $data->id)); ?>"><i class="feather icon-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td <?php echo e(Auth::user()->rol=='admin' ? "colspan=6" : "colspan=4"); ?> class="text-center">No hay usuarios creados</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
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

<!-- END: Content-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<!-- BEGIN: Page Vendor JS-->

<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/datatables/datatable.js"></script>
<script>
    function cambiarPermisosSms(id, permiso) { 
        var url = "<?php echo e(route('users.permisos-sms', ':id')); ?>";
        url = url.replace(':id', id);

        $.ajax({
            type: "PUT",
            url: url,
            data: {
                '_token': '<?php echo e(csrf_token()); ?>',
                'permiso': permiso
            }
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/usuarios/index.blade.php ENDPATH**/ ?>