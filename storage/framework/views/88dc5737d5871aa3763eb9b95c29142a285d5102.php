<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" media="screen, print" href="<?php echo e(url('/')); ?>/includes/dashboard/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo e(url('/')); ?>/includes/dashboard/css/app.bundle.css">  
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
                                    <div class="col-12">
                                        <form class="form-group" id="frm" action="<?php echo e(route('dashboard')); ?>" method="get">
                                            <input type="hidden" name="submit" value="done">
                                            <div class="row">            
                                                <div class="col-12 col-md-2">
                                                    <select class="form-control" name="location" required>
                                                        <option value="">Escoge una estación&nbsp;&nbsp;</option>
                                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($item->id); ?>" <?php if($item->id == $location_id): ?> selected <?php endif; ?>><?php echo e(ucfirst($item->alias)); ?> - <?php echo e(ucfirst($item->campana->nombre)); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <input class="form-control input-daterange-datepicker" type="text"/>
                                                    <input type="hidden" id="start" name="start" value="<?php echo e(carbon\Carbon::createFromFormat('m/d/Y', $start)->format('Y-m-d')); ?>"/>
                                                    <input type="hidden" id="end" name="end" value="<?php echo e(carbon\Carbon::createFromFormat('m/d/Y', $end)->format('Y-m-d')); ?>"/>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <select class="form-control" name="type" required>
                                                        <option value="">Escoge un tipo de filtro</option>
                                                        <option value="10min" <?php if($type == '10min'): ?> selected <?php endif; ?>>Cada 10 minutos</option>
                                                        <option value="1hora" <?php if($type == '1hora'): ?> selected <?php endif; ?>>Cada hora</option>
                                                        <option value="8horas" <?php if($type == '8horas'): ?> selected <?php endif; ?>>Cada 8 horas</option>
                                                        <option value="diario" <?php if($type === 'diario'): ?> selected <?php endif; ?>>Cada día</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <input type="submit" value="Graficar" class="btn btn-outline-info waves-effect waves-light">
                                                </div>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                                <div class="col-12">&nbsp;</div>
                            </div>

                            
                            <?php if($filtered): ?>
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="col-12">
                                            <canvas id="line-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="card">
                                        <div class="card-content">
                                            <div class="panel-content p-0">
                                                <div class="row row-grid no-gutters">
                                                    <?php $__empty_1 = true; $__currentLoopData = $location->contaminantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?> 
                                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <div class="px-3 py-2 d-flex align-items-center">
                                                                <div class="js-easy-pie-chart color-primary-500 position-relative d-inline-flex align-items-center justify-content-center" data-percent="<?php echo e($minval[$item->nombre_campo.'max']); ?>" data-piesize="50" data-linewidth="5" data-linecap="butt" data-scalelength="0">
                                                                    <div class="d-flex flex-column align-items-center justify-content-center position-absolute pos-left pos-right pos-top pos-bottom fw-300 fs-lg">
                                                                        <span class="js-percent d-block text-dark"></span>
                                                                    </div>
                                                                </div>
                                                                <span class="d-inline-block ml-2 text-muted">
                                                                    <?php echo e($item->nombre); ?>

                                                                    <i class="fal fa-caret-up color-danger-500 ml-1"></i>
                                                                </span>
                                                                <div class="ml-auto d-inline-flex align-items-center">
                                                                    <div class="sparklines d-inline-flex" sparktype="line" sparkheight="30" sparkwidth="65" sparklinecolor="#886ab5" sparkfillcolor="false" sparklinewidth="1" values="5,6,5,3,8,6,9,7,4,2"></div>
                                                                    <div class="d-inline-flex flex-column small ml-2">
                                                                        <span class="d-inline-block badge badge-success opacity-50 text-center p-1 width-6"><?php echo e($minval[$item->nombre_campo]); ?></span>
                                                                        <span class="d-inline-block badge bg-fusion-300 opacity-50 text-center p-1 width-6 mt-1"><?php echo e($minval[$item->nombre_campo.'max']); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <p id="js-color-profile" class="d-none">
        <span class="color-primary-50"></span>
        <span class="color-primary-100"></span>
        <span class="color-primary-200"></span>
        <span class="color-primary-300"></span>
        <span class="color-primary-400"></span>
        <span class="color-primary-500"></span>
        <span class="color-primary-600"></span>
        <span class="color-primary-700"></span>
        <span class="color-primary-800"></span>
        <span class="color-primary-900"></span>
        <span class="color-info-50"></span>
        <span class="color-info-100"></span>
        <span class="color-info-200"></span>
        <span class="color-info-300"></span>
        <span class="color-info-400"></span>
        <span class="color-info-500"></span>
        <span class="color-info-600"></span>
        <span class="color-info-700"></span>
        <span class="color-info-800"></span>
        <span class="color-info-900"></span>
        <span class="color-danger-50"></span>
        <span class="color-danger-100"></span>
        <span class="color-danger-200"></span>
        <span class="color-danger-300"></span>
        <span class="color-danger-400"></span>
        <span class="color-danger-500"></span>
        <span class="color-danger-600"></span>
        <span class="color-danger-700"></span>
        <span class="color-danger-800"></span>
        <span class="color-danger-900"></span>
        <span class="color-warning-50"></span>
        <span class="color-warning-100"></span>
        <span class="color-warning-200"></span>
        <span class="color-warning-300"></span>
        <span class="color-warning-400"></span>
        <span class="color-warning-500"></span>
        <span class="color-warning-600"></span>
        <span class="color-warning-700"></span>
        <span class="color-warning-800"></span>
        <span class="color-warning-900"></span>
        <span class="color-success-50"></span>
        <span class="color-success-100"></span>
        <span class="color-success-200"></span>
        <span class="color-success-300"></span>
        <span class="color-success-400"></span>
        <span class="color-success-500"></span>
        <span class="color-success-600"></span>
        <span class="color-success-700"></span>
        <span class="color-success-800"></span>
        <span class="color-success-900"></span>
        <span class="color-fusion-50"></span>
        <span class="color-fusion-100"></span>
        <span class="color-fusion-200"></span>
        <span class="color-fusion-300"></span>
        <span class="color-fusion-400"></span>
        <span class="color-fusion-500"></span>
        <span class="color-fusion-600"></span>
        <span class="color-fusion-700"></span>
        <span class="color-fusion-800"></span>
        <span class="color-fusion-900"></span>
    </p>
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
        $('.input-daterange-datepicker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            $('#start').val(picker.startDate.format('YYYY-MM-DD'));
            $('#end').val(picker.endDate.format('YYYY-MM-DD'));
        });

        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            startDate: '<?php echo e($start); ?>', 
            endDate: '<?php echo e($end); ?>',
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

        <?php if($filtered): ?>
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
                
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files\Ampps\www\CustomAirData\resources\views/panelDeAnalisis/index.blade.php ENDPATH**/ ?>