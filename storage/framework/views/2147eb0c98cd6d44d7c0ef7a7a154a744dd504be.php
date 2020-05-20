<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php echo e("$cantidad archivos cargados satisfactoriamente"); ?> 
</div>

<div class="card">
    <div class="card-header text-center">
        <div class="col-12 text-center">
            <h4><?php echo e('Archivos cargados ('.count($archivos).')'); ?></h4>
        </div>
    </div>
    <div class="card-body" style="max-height: 200px; overflow: auto">
        <table class="table table-striped">
            <?php $__empty_1 = true; $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="text-center">
                        <?php echo e($item); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="text-center">
                        No hay datos para este punto de monitoreo
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div><?php /**PATH /home/logjanec/public_html/customair/resources/views/puntosMonitoreo/actualizacionTablaDatos.blade.php ENDPATH**/ ?>