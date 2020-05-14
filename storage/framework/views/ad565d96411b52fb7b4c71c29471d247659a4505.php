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
                                <h4 class="card-title">Listado de empresas</h4>
                            <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                    <a href="<?php echo e(route('empresas.create')); ?>" class="btn btn-outline-warning">Crear una nueva empresa</a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>NIT</th>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Dirección</th>
                                                    <th>Administrador</th>
                                                    <th>Fecha de creación</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $empresas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e($item->nit); ?></td>
                                                        <td><?php echo e(ucfirst($item->nombre)); ?></td>
                                                        <td><?php echo e($item->correo); ?></td>
                                                        <td><?php echo e($item->telefono); ?></td>
                                                        <td><?php echo e(ucfirst($item->direccion)); ?></td>
                                                        <td><?php echo e($item->manager ? ucwords($item->manager->name) : 'Sin manager'); ?></td>
                                                        <td><?php echo e(carbon\Carbon::parse($item->created_at)->format('d/m/Y g:i A')); ?></td>
                                                        <td>
                                                            <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="<?php echo e(route('empresas.edit', $item->id)); ?>"><i class="feather icon-edit"></i></a>
                                                            <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="<?php echo e(route('empresas.destroy', $item->id)); ?>"><i class="feather icon-trash-2"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                                                    <tr>
                                                        <td colspan="8" class="text-center">No hay empresas existentes</td>
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

<!-- BEGIN: DataTables-->

<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: DataTables-->

<script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/datatables/datatable.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/empresas/index.blade.php ENDPATH**/ ?>