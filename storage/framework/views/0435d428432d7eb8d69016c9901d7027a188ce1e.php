<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay">
    </div>
    <div class="header-navbar-shadow">
    </div>
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
                                <h4 class="card-title">Listado de campañas</h4>
                                <?php if(Auth::user()->rol=='admin'): ?>
                                    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                        <a href="<?php echo e(route('campanas.create')); ?>" class="btn btn-outline-warning">Crear una nueva campaña</a> 
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <?php if(Auth::user()->rol=='admin'): ?>
                                                        <th>Empresa</th>
                                                    <?php endif; ?>
                                                    <th>Fecha de inicio</th>
                                                    <th>Fecha de fin</th>
                                                    <th>Descripción</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $campanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e(ucfirst($item->nombre)); ?></td>
                                                        <?php if(Auth::user()->rol=='admin'): ?>
                                                            <td><?php echo e(ucfirst($item->empresa->nombre)); ?></td>
                                                        <?php endif; ?>
                                                        <td><?php echo e(carbon\Carbon::parse($item->fecha_inicio)->format('d/m/Y')); ?></td>
                                                        <td><?php echo e(carbon\Carbon::parse($item->fecha_fin)->format('d/m/Y')); ?></td>
                                                        <td><?php echo e(ucfirst($item->observaciones)); ?></td>
                                                        <td>
                                                            <a class="btn btn-icon btn-outline-primary waves-effect waves-light" href="<?php echo e(route('puntos-monitoreo.index', $item->id)); ?>"><i class="feather icon-server"></i></a>
                                                            <?php if(Auth::user()->rol=='admin'): ?>
                                                                <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="<?php echo e(route('campanas.edit', $item->id)); ?>"><i class="feather icon-edit"></i></a>
                                                                <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="<?php echo e(route('campanas.destroy', $item->id)); ?>"><i class="feather icon-trash-2"></i></a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td <?php echo e(Auth::user()->rol=='admin' ? "colspan=6" : "colspan=5"); ?> class="text-center">No hay campañas creadas</td>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<!-- BEGIN: Page Vendor JS-->
<!-- <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script> -->
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<!-- <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script> -->
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/datatables/datatable.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/campanas/index.blade.php ENDPATH**/ ?>