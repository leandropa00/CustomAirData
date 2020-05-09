<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Filtrar por nombre</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                            <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                                            <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                        
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" id="form">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Punto de monitoreo</label>
                                                            <select class="custom-select form-control" id="estacion" name="location_id">
                                                                <?php $__currentLoopData = $estaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($item->id); ?>"><?php echo e(ucfirst($item->alias)); ?> - <?php echo e(ucfirst($item->campana->nombre)); ?> - <?php echo e(ucfirst($item->campana->empresa->nombre)); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Rango de fechas</label>
                                                            <input class="form-control input-daterange-datepicker" type="text"/>
                                                            <input type="hidden" id="start" name="start" value="<?php echo e(carbon\Carbon::createFromFormat('m/d/Y', $inicio)->format('Y-m-d')); ?>"/>
                                                            <input type="hidden" id="end" name="end" value="<?php echo e(carbon\Carbon::createFromFormat('m/d/Y', $fin)->format('Y-m-d')); ?>"/>
                                                        </div>
                                                    </div>
                                                        
                                                    <div class="col-12">
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
                                                                    <input class="checkbox_contaminantes" type="checkbox" value="<?php echo e($item->nombre_campo); ?>" name="contaminantes[]">
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
                                        </form>
                                        
                                        <div class="col-12">
                                            <button onclick="generate()" class="btn btn-primary mr-1 mb-1">Consultar</button>
                                            
                                            <a href="<?php echo e(route('consulta-de-datos')); ?>" class="btn btn-outline-warning mr-1 mb-1">Limpiar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div id="insertTable"></div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- INI: Datepicker -->
    <script src="<?php echo e(asset('moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- END: Datepicker -->
    
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script>

        function generate() {
            $.ajax({
                type: "get",
                url: "<?php echo e(route('submit_filter')); ?>",
                data: $('#form').serialize(),
                success: function (response) {
                    $('#insertTable').html(response.html);
                    loadTable(response.contaminantes);
                }
            });
        }

        function loadTable(contaminantes){
            var id = $('#estacion').val();
            var start = $('#start').val();
            var end = $('#end').val();

            var columns = [
                { data: 'date' },
                { data: 'time' }
            ]

            $.each(contaminantes, function (indexInArray, valueOfElement) { 
                columns.push({ data: valueOfElement });
            });

            $('#table').DataTable({
                responsive: true,
                processing: true,
                ajax: "<?php echo e(route('cargarTabla')); ?>?id="+id+"&start="+start+"&end="+end,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                columns: columns,
            });
        }

        $('.input-daterange-datepicker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            $('#start').val(picker.startDate.format('YYYY-MM-DD'));
            $('#end').val(picker.endDate.format('YYYY-MM-DD'));
        });

        $('.input-daterange-datepicker').daterangepicker({
            format: 'DD/MM/YYYY',
            buttonClasses: ['btn', 'btn-sm'],
            startDate: '<?php echo e($inicio); ?>', 
            endDate: '<?php echo e($fin); ?>',
            cancelClass: 
                'btn-inverse',
                "locale": {
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar",
                    "daysOfWeek": [
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sá",
                        "Do"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ]
                }
        });

        $('#all_checkbox').change(function () { 
            if($(this).is(':checked')) {
                $('.checkbox_contaminantes').prop('checked', true);
            } else {
                $('.checkbox_contaminantes').prop('checked', false);
            }
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files\Ampps\www\CustomAirData\resources\views/consultaDeDatos/index.blade.php ENDPATH**/ ?>