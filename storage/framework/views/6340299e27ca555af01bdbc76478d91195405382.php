<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap-daterangepicker/daterangepicker.css')); ?>">
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
                                    <h4 class="card-title">Panel de análisis</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <form class="form-group" id="frm" action="<?php echo e(route('dashboard')); ?>" method="get">
                                            <input type="hidden" name="submit" value="done">
                                            <div class="row">            
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>Punto de monitoreo</label>
                                                        <select class="form-control" id="location" name="location" required>
                                                            <option value="">Escoge un punto de monitoreo</option>
                                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($item->id); ?>" 
                                                                data-start="<?php echo e(carbon\Carbon::parse($item->campana->fecha_inicio)->format('m/d/Y')); ?>" 
                                                                data-end="<?php echo e(carbon\Carbon::parse($item->campana->fecha_fin)->format('m/d/Y')); ?>" 
                                                                <?php if($item->id == $location_id): ?> selected <?php endif; ?>>
                                                                    <?php echo e(ucfirst($item->alias)); ?> - <?php echo e(ucfirst($item->campana->nombre)); ?> - <?php echo e(ucfirst($item->campana->empresa->nombre)); ?>

                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Rango de fechas (m/d/a)</label>
                                                        <input class="form-control input-daterange-datepicker rango" type="text" name="dates" readonly/>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Intervalo</label>
                                                        <select class="form-control" name="type" required>
                                                            <option value="">Escoge un tipo de filtro</option>
                                                            <option value="10min" <?php if($type == '10min'): ?> selected <?php endif; ?>>Cada 10 minutos</option>
                                                            <option value="1hora" <?php if($type == '1hora'): ?> selected <?php endif; ?>>Cada hora</option>
                                                            <option value="8horas" <?php if($type == '8horas'): ?> selected <?php endif; ?>>Cada 8 horas</option>
                                                            <option value="diario" <?php if($type === 'diario'): ?> selected <?php endif; ?>>Cada día</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-2">
                                                    <button class="btn btn-outline-info waves-effect waves-light" style="margin-top:15px">Graficar</button>
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>

                            <?php if($filtered): ?>
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <canvas id="line-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row match-height">
                                    <?php $__empty_1 = true; $__currentLoopData = $location->contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                                        <div class="col-md-3 col-12">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between pb-0">
                                                    <h4><?php echo e($item->nombre); ?></h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="chart-info d-flex justify-content-between mb-1">
                                                            <div class="series-info d-flex align-items-center">
                                                                <i class="fa fa-circle-o text-bold-700 text-info"></i>
                                                                <span class="text-bold-600 ml-50">Promedio</span>
                                                            </div>
                                                            <div class="product-result">
                                                                <span><?php echo e($minval[$item->nombre_campo.'avg']); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="chart-info d-flex justify-content-between mb-1">
                                                            <div class="series-info d-flex align-items-center">
                                                                <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                                                <span class="text-bold-600 ml-50">Máximo</span>
                                                            </div>
                                                            <div class="product-result">
                                                                <span><?php echo e($minval[$item->nombre_campo.'max']); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="chart-info d-flex justify-content-between mb-75">
                                                            <div class="series-info d-flex align-items-center">
                                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                                <span class="text-bold-600 ml-50">Mínimo</span>
                                                            </div>
                                                            <div class="product-result">
                                                                <span><?php echo e($minval[$item->nombre_campo]); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- INI: Bundle js-->
    <script src="<?php echo e(url('/')); ?>/includes/dashboard/js/vendors.bundle.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/dashboard/js/app.bundle.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/vendors.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/dashboard/js/statistics/sparkline/sparkline.bundle.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/dashboard/js/statistics/easypiechart/easypiechart.bundle.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/dashboard/js/statistics/flot/flot.bundle.js"></script>
    <!-- END: Bundle js-->
    
    <!-- INI: Datepicker -->
    <script src="<?php echo e(asset('moment/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- END: Datepicker -->
    
    <!-- INI: Zoom charts plug-in-->
    
    <!-- END: Zoom charts plug-in-->
    <script>
        $('#location').change(function () { 
            if (!$(this).val()) {
                $('.rango').val('');
                
            } else {
                var selected = $(this).find('option:selected');
                var inicio = selected.data('start'); 
                var fin = selected.data('end'); 

                rangeClass(inicio, fin, inicio, fin);
            }
        });

        <?php if($filtered): ?>
            rangeClass(
                "<?php echo e(carbon\Carbon::parse($start)->format('m/d/Y')); ?>", 
                "<?php echo e(carbon\Carbon::parse($end)->format('m/d/Y')); ?>",
                "<?php echo e(carbon\Carbon::parse($location->campana->fecha_inicio)->format('m/d/Y')); ?>", 
                "<?php echo e(carbon\Carbon::parse($location->campana->fecha_fin)->format('m/d/Y')); ?>"
            );

            $(window).on("load", function () {     

                var linechartOptions = {
                    responsive: true,
                    hover: {
                        mode: 'label'
                    },
                    scales: {
                        xAxes: [{
                        display: true,
                        gridLines: {
                            color: '#dae1e7',
                        },
                        scaleLabel: {
                            display: false,
                        }
                        }],
                        yAxes: [{
                        display: true,
                        gridLines: {
                            color: '#dae1e7',
                        },
                        scaleLabel: {
                            display: true,
                        }
                        }]
                    },
                    // plugins: {
                    //     zoom: {
                    //         pan: {
                    //         enabled: true,
                    //         mode: 'xy',
                    //         rangeMin: {
                    //             x: null,
                    //             y: null
                    //         },
                    //         rangeMax: {
                    //             x: null,
                    //             y: null
                    //         },
                    //         speed: 20,
                    //         threshold: 10,
                    //         onPan: function({chart}) { console.log(`I'm panning!!!`); },
                    //         onPanComplete: function({chart}) { console.log(`I was panned!!!`); }
                    //     },
                    //     zoom: {
                    //         enabled: true,
                    //         drag: false,
                    //         mode: 'xy',
                    //         rangeMin: {
                    //             x: null,
                    //             y: null
                    //         },
                    //         rangeMax: {
                    //             x: null,
                    //             y: null
                    //         },
                    //         speed: 0.2,
                    //         sensitivity: 3,
                    //         onZoom: function({chart}) { console.log(`I'm zooming!!!`); },
                    //         onZoomComplete: function({chart}) { console.log(`I was zoomed!!!`); }
                    //         }
                    //     }
                    // }
                };

                var linechartData = {
                    labels: JSON.parse('<?php echo e($labels); ?>'.replace(/&quot;/g,'"')),
                    datasets: [
                        <?php 
                            $i = 0;
                        ?> 
                        <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            {
                                label: '<?php echo e(strtoupper($key)); ?>',
                                data: <?php echo e($item); ?>,
                                borderColor: '<?php echo e($colores[$i]); ?>',
                                fill: true
                            },
                            <?php 
                                $i++;
                            ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ]
                };

                var lineChartconfig = {
                    type: 'line',
                    options: linechartOptions,
                    data: linechartData
                };

                var lineChart = new Chart($("#line-chart"), lineChartconfig);
            });
        <?php endif; ?>

        function rangeClass(inicio, fin, min, max) { 
            $('.input-daterange-datepicker').daterangepicker({
                buttonClasses: ['btn', 'btn-sm'],
                minDate: min, 
                maxDate: max,
                startDate: inicio, 
                endDate: fin,
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
        }                
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/panelDeAnalisis/index.blade.php ENDPATH**/ ?>