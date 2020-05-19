@extends('layouts.iframemaster')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/vendors/css/pickers/pickadate/pickadate.css">
@endsection

@section('content')

  <canvas id="line-chart"></canvas>

@endsection

@section('js')
  <!-- INI: charts -->
  <script src="{{url('/')}}/includes/app-assets/vendors/js/vendors.min.js"></script>
  <script src="{{url('/')}}/includes/app-assets/vendors/js/charts/chart.min.js"></script>
  <!-- END: charts -->

  <!-- END: Zoom charts plug-in-->
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1"></script>
  <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.4"></script> --}}
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
            ticks: {
              fontSize: 10,
            },
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
        labels: JSON.parse('{{ $labels }}'.replace(/&quot;/g,'"')),
        datasets: [
          {
            label: ['{{strtoupper($val)}}'],
            data: {{$datos}},
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
@endsection