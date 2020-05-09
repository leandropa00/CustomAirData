<div class="card">
    <div class="card-body card-dashboard">
        <div class="col-12">
            <h4 class="card-title">Datos</h4>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-striped dataex-html5-selectors" id="table">
                <thead>
                    <tr>
                        <th>Día</th>
                        <th>Hora</th>
                        <?php $__empty_1 = true; $__currentLoopData = $contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <th><?php echo e($item); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <th></th>
                        <?php endif; ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\Program Files\Ampps\www\CustomAirData\resources\views/consultaDeDatos/tabla_consulta_datos.blade.php ENDPATH**/ ?>