<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
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
                    <form class="form form-vertical" action="<?php echo e(route('puntos-monitoreo.guardar_rangos', $puntoMonitoreo)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <h4 class="card-title">Seleccione los rangos de los contaminantes para el punto de monitoreo <?php echo e($puntoMonitoreo->alias); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $__empty_1 = true; $__currentLoopData = $puntoMonitoreo->contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <div class="form-group col-md-4 col-6">
                                                    <div class="text-center">
                                                        <label><?php echo e(strtoupper($item->nombre)); ?> (<?php echo e($item->unidad_final); ?>)</label>
                                                    </div>
                                                    <input type="hidden" name="contaminantes[]" value="<?php echo e($item->id); ?>">
                                                    <div class="row form-group">
                                                        <div class="col-md-6 col-6">
                                                            <input type="number" step="any" class="form-control" name="min[]" placeholder="Valor mínimo" value="<?php echo e($item->pivot->minimo); ?>">
                                                        </div>
                                                        <div class="col-md-6 col-6">
                                                            <input type="number" step="any" class="form-control" name="max[]" placeholder="Valor máximo" value="<?php echo e($item->pivot->maximo); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/puntosMonitoreo/contaminantes.blade.php ENDPATH**/ ?>