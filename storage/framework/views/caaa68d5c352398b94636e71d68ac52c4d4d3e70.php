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
                        <th colspan="<?php echo e(count($contaminantes)+2); ?>" class="text-center"><?php echo e($punto->alias.' - '.$punto->campana->nombre.' - '.$punto->campana->empresa->nombre); ?></th>
                    </tr>
                    <tr>
                        <th>DÍA</th>
                        <th>HORA</th>
                        <?php $__empty_1 = true; $__currentLoopData = $contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <th><?php echo e("$item->nombre ($item->unidad_inicial)"); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php /**PATH /Applications/AMPPS/www/customair/resources/views/consultaDeDatos/tabla_consulta_datos.blade.php ENDPATH**/ ?>