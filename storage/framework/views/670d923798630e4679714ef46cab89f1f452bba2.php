<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12">
            <h4 class="card-title">Contaminantes</h4>
        </div>
        
        <div class="form-group col-md-2 col-6">
            <fieldset class="checkbox">
                <div class="vs-checkbox-con vs-checkbox-secondary">
                    <input id="all_checkbox" type="checkbox" name="all" value="1">
                    <span class="vs-checkbox">
                        <span class="vs-checkbox--check">
                            <i class="vs-icon feather icon-check"></i>
                        </span>
                    </span>
                    <span>Todos</span>
                </div>
            </fieldset>
        </div>
        
        <?php $__empty_1 = true; $__currentLoopData = $contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="form-group col-md-2 col-6">
                <fieldset class="checkbox">
                    <div class="vs-checkbox-con vs-checkbox-primary">
                        <input class="checkbox_contaminantes" type="checkbox" value="<?php echo e($item->id); ?>" name="contaminantes[]">
                        <span class="vs-checkbox">
                            <span class="vs-checkbox--check">
                                <i class="vs-icon feather icon-check"></i>
                            </span>
                        </span>
                        <span><?php echo e(strtoupper($item->nombre)); ?></span>
                    </div>
                </fieldset>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </div>
</div>

<script>
    $('#all_checkbox').change(function () { 
        if($(this).is(':checked')) {
            $('.checkbox_contaminantes').prop('checked', true);
        } else {
            $('.checkbox_contaminantes').prop('checked', false);
        }
    });
</script><?php /**PATH /Applications/AMPPS/www/customair/resources/views/consultaDeDatos/contaminantes.blade.php ENDPATH**/ ?>