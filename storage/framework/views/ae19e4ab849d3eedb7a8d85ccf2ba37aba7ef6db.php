<link rel="stylesheet" href="<?php echo e(asset('dropzone/dist/dropzone.css')); ?>">

<div class="alert alert-success" id="alerta" style="display: none">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Datos cargados correctamente a la base de datos
</div>

<div id="tabla">
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
    </div>
</div>

<div class="card">
    <div class="card-header text-center">
        <div class="col-12 text-center">
            <h4>Sube un nuevo archivo</h4>
        </div>
    </div>
    <div class="card-body">
        <form class="dropzone dropzone needsclick dz-clickable" id="dropzone-form">
            <?php echo csrf_field(); ?>
            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>
        </form>
    </div>
</div>


<div class="card" id="carga" <?php if(empty($archivos)): ?> style="display: none" <?php endif; ?>>
    <div class="card-header text-center">
        <div class="col-12 text-center">
            <h4>Carga tus archivos a la base de datos</h4>
        </div>
    </div>
    <div class="card-body">
        <div class="col-12 text-center">
            <button class="btn btn-info" id="cargarBD">Cargar</button>
        </div>
    </div>
</div>


<script src="<?php echo e(asset('dropzone/dist/dropzone.js')); ?>"></script>
<script>
    $("#dropzone-form").dropzone({
        url: "<?php echo e(route('puntos-monitoreo.cargaDatos', $punto->id)); ?>",
        dictDefaultMessage: "Arrastra tus archivos .dat aquí", 
        maxFilesize: 1,
        accept: function(file, done) {
            if (file.name.length == 12 && file.name.substr(-4,4) == '.dat') {
                done();           
            } else {
                done("Sólo se aceptan archivos .dat");                
            }
            this.on("complete", function (file, response) {
                var url = "<?php echo e(route('puntos-monitoreo.recargarTablaDatos', [$punto->id, ':i'])); ?>"
                url = url.replace(':i', this.getAcceptedFiles().length);

                $.ajax({
                    type: "get",
                    url: url,
                    success: function (response) {
                        $('#tabla').html(response);  
                        $('#carga').show();
                    }
                });
            })
        },
    });
    
    $('#cargarBD').click(function () { 
        $.ajax({
            type: "get",
            url: "<?php echo e(route('puntos-monitoreo.cargaDatosBD', $punto->id)); ?>",
            success: function (response) {
                $('#alerta').show();
            }
        });        
    });
</script>
<?php /**PATH /home/logjanec/public_html/customair/resources/views/puntosMonitoreo/cargaManual.blade.php ENDPATH**/ ?>