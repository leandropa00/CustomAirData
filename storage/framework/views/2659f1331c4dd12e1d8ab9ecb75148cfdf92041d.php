<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/includes/app-assets/vendors/css/pickers/pickadate/pickadate.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <canvas id="line-chart"></canvas>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <!-- INI: charts -->
  <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/vendors.min.js"></script>
  <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/charts/chart.min.js"></script>
  <!-- END: charts -->

  <!-- END: Zoom charts plug-in-->
  
  <!-- END: Zoom charts plug-in-->
  <script>
    $(window).on("load", function () {     

      // Chart Options
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
        maintainAspectRatio: false,
        // plugins: {
        //   zoom: {
        //     pan: {
        //     enabled: true,
        //     mode: 'xy',
        //     rangeMin: {
        //         x: null,
        //         y: null
        //     },
        //     rangeMax: {
        //         x: null,
        //         y: null
        //     },
        //     speed: 20,
        //     threshold: 10,
        //     onPan: function({chart}) { console.log(`I'm panning!!!`); },
        //     onPanComplete: function({chart}) { console.log(`I was panned!!!`); }
        // },
        // zoom: {
        //     enabled: true,
        //     drag: false,
        //     mode: 'xy',
        //     rangeMin: {
        //         x: null,
        //         y: null
        //     },
        //     rangeMax: {
        //         x: null,
        //         y: null
        //     },
        //     speed: 0.2,
        //     sensitivity: 3,
        //     onZoom: function({chart}) { console.log(`I'm zooming!!!`); },
        //     onZoomComplete: function({chart}) { console.log(`I was zoomed!!!`); }
        //   }
        //   }
        // }
      };
      
      var linechartData = {
        labels: JSON.parse('<?php echo e($labels); ?>'.replace(/&quot;/g,'"')),
        datasets: [
          {
            label: ['<?php echo e(strtoupper($val)); ?>'],
            data: <?php echo e($datos); ?>,
            borderColor: ['#7367F0'],
            fill: true
          }
        ]
      };

      var lineChartconfig = {
        type: 'line',
        options: linechartOptions,
        data: linechartData
      };

      var lineChart = new Chart($("#line-chart"), lineChartconfig);

    });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.iframemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/mapa/grafica.blade.php ENDPATH**/ ?>