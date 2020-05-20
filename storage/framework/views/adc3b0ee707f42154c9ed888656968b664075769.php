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
                                <h4 class="card-title">Listado de puntos de monitoreo de <?php echo e($campana->nombre); ?></h4>
                                <?php if(Auth::user()->rol=='admin'): ?>
                                    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                        <a href="<?php echo e(route('puntos-monitoreo.create', $campana->id)); ?>" class="btn btn-outline-warning">Crear un nuevo punto de monitoreo</a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Alias</th>
                                                    <th>Estación</th>
                                                    <th>Latitud</th>
                                                    <th>Longitud</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $puntos_monitoreo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                  <tr>
                                                    <td><?php echo e(ucwords($item->alias)); ?></td>
                                                    <td><?php echo e(ucfirst($item->estacion->nombre)); ?></td>
                                                    <td><?php echo e($item->latitud); ?></td>
                                                    <td><?php echo e($item->longitud); ?></td>
                                                    <td>
                                                        <button onclick="abrirModal(<?php echo e($item->id); ?>)" class="btn btn-icon btn-outline-primary waves-effect waves-light"><i class="feather icon-info"></i></button>                                                          
                                                        <a class="btn btn-icon btn-outline-secondary waves-effect waves-light" target="_blank" href="<?php echo e(route('puntos-monitoreo.imprimir', $item->id)); ?>"><i class="feather icon-printer"></i></a>
                                                        <a class="btn btn-icon btn-outline-vimeo waves-effect waves-light" href="<?php echo e(route('puntos-monitoreo.contaminantes', $item->id)); ?>"><i class="feather icon-wind"></i></a>
                                                        <?php if(Auth::user()->rol=='admin'): ?>
                                                            <?php if($item->carga_automatica == '0'): ?>
                                                                <button onclick="modalCarga(<?php echo e($item->id); ?>)" class="btn btn-icon btn-outline-dark waves-effect waves-light"><i class="feather icon-upload"></i></button>                                                          
                                                            <?php endif; ?>
                                                            <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="<?php echo e(route('puntos-monitoreo.edit', $item->id)); ?>"><i class="feather icon-edit"></i></a>
                                                            <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="<?php echo e(route('puntos-monitoreo.destroy', $item->id)); ?>"><i class="feather icon-trash-2"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">No hay puntos de monitoreo creados</td>
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

<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetallesLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDetallesBody">
                Cargando...
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCargaLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalCargaBody">
                Cargando...
            </div>
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
    function abrirModal(id){
        var url = "<?php echo e(route('puntos-monitoreo.show', ':id')); ?>";
        url = url.replace(':id', id);

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                $("#modalDetalles").modal("show");                
                $("#modalDetallesLabel").html('Detalles de '+response.titulo);                
                $("#modalDetallesBody").html(response.html);                   
            }
        });
    }

    function modalCarga(id){
        var url = "<?php echo e(route('puntos-monitoreo.modalCargaManual', ':id')); ?>";
        url = url.replace(':id', id);

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                $("#modalCarga").modal("show");                
                $("#modalCargaLabel").html('Carga manual de datos para '+response.titulo);                
                $("#modalCargaBody").html(response.html);                   
            }
        });
    }

    function imprimir(id){
        var url = "<?php echo e(route('puntos-monitoreo.imprimir', ':id')); ?>";
        url = url.replace(':id', id)
        window.open(url);
    }
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/puntosMonitoreo/index.blade.php ENDPATH**/ ?>