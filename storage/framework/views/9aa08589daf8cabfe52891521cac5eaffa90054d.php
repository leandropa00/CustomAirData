<?php $__empty_1 = true; $__currentLoopData = $estacion->puntosDeMonitoreo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="row">
        <div class="col-12 form-group">
            <label>Punto de monitoreo: </label>
            <?php echo e($item->alias); ?>

        </div>
        <div class="col-12 form-group">
            <label>Latitud: </label>
            <?php echo e($item->latitud); ?>

        </div>
        <div class="col-12 form-group">
            <label>Longitud: </label>
            <?php echo e($item->longitud); ?>

        </div>
        <div class="col-12 form-group">
            <label>Campaña: </label>
            <?php echo e($item->campana->nombre); ?>

        </div>
        <div class="col-12 form-group">
            <label>Empresa: </label>
            <?php echo e($item->campana->empresa->nombre); ?>

        </div>
        <div class="col-12 form-group">
            <label>Fecha de creación del punto: </label>
            <?php echo e(carbon\Carbon::parse($item->created_at)->format('d-m-Y g:i A')); ?>

        </div>
    </div>
    <hr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    
<?php endif; ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/estaciones/modal.blade.php ENDPATH**/ ?>