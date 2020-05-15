@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height" id="impr">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Panel de análisis</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <form class="form-group" id="frm" action="{{ route('dashboard') }}" method="get">
                                            <input type="hidden" name="submit" value="done">
                                            <div class="row">            
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>Punto de monitoreo</label>
                                                        <select class="form-control" id="location" name="location" required>
                                                            <option value="">Escoge un punto de monitoreo</option>
                                                            @foreach($locations as $item)
                                                                <option value="{{$item->id}}" 
                                                                data-start="{{carbon\Carbon::parse($item->campana->fecha_inicio)->format('m/d/Y')}}" 
                                                                data-end="{{carbon\Carbon::parse($item->campana->fecha_fin)->format('m/d/Y')}}" 
                                                                @if($item->id == $location_id) selected @endif>
                                                                    {{ucfirst($item->alias)}} - {{ucfirst($item->campana->nombre)}} - {{ucfirst($item->campana->empresa->nombre)}}
                                                                </option>
                                                            @endforeach
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
                                                            <option value="10min" @if($type == '10min') selected @endif>Cada 10 minutos</option>
                                                            <option value="1hora" @if($type == '1hora') selected @endif>Cada hora</option>
                                                            <option value="8horas" @if($type == '8horas') selected @endif>Cada 8 horas</option>
                                                            <option value="diario" @if($type === 'diario') selected @endif>Cada día</option>
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

                            @if ($filtered)
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
                                    @forelse ($location->contaminantes as $item) 
                                        <div class="col-md-3 col-12">
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between pb-0">
                                                    <h4>{{$item->nombre}}</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="chart-info d-flex justify-content-between mb-1">
                                                            <div class="series-info d-flex align-items-center">
                                                                <i class="fa fa-circle-o text-bold-700 text-info"></i>
                                                                <span class="text-bold-600 ml-50">Promedio</span>
                                                            </div>
                                                            <div class="product-result">
                                                                <span>{{$minval[$item->nombre_campo.'avg']}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="chart-info d-flex justify-content-between mb-1">
                                                            <div class="series-info d-flex align-items-center">
                                                                <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                                                <span class="text-bold-600 ml-50">Máximo</span>
                                                            </div>
                                                            <div class="product-result">
                                                                <span>{{$minval[$item->nombre_campo.'max'] }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="chart-info d-flex justify-content-between mb-75">
                                                            <div class="series-info d-flex align-items-center">
                                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                                <span class="text-bold-600 ml-50">Mínimo</span>
                                                            </div>
                                                            <div class="product-result">
                                                                <span>{{ $minval[$item->nombre_campo] }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="card col-md-12 text-center">
                                    <div class="card-body col-md-12">
                                        <a href="javascript:captura();" class="btn btn-outline-info waves-effect waves-light">Guardar imagen</a>
                                        <a href="" id="blank"></a>
                                    </div>    
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- INI: Bundle js-->
    <script src="{{url('/')}}/includes/dashboard/js/vendors.bundle.js"></script>
    <script src="{{url('/')}}/includes/dashboard/js/app.bundle.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{url('/')}}/includes/dashboard/js/statistics/sparkline/sparkline.bundle.js"></script>
    <script src="{{url('/')}}/includes/dashboard/js/statistics/easypiechart/easypiechart.bundle.js"></script>
    <script src="{{url('/')}}/includes/dashboard/js/statistics/flot/flot.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <!-- END: Bundle js-->
    
    <!-- INI: Datepicker -->
    <script src="{{ asset('moment/moment.js') }}"></script>
    <script src="{{ asset('bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- END: Datepicker -->
    
    <!-- INI: Zoom charts plug-in-->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.4"></script> --}}
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

        @if ($filtered)
            rangeClass(
                "{{carbon\Carbon::parse($start)->format('m/d/Y')}}", 
                "{{carbon\Carbon::parse($end)->format('m/d/Y')}}",
                "{{carbon\Carbon::parse($location->campana->fecha_inicio)->format('m/d/Y')}}", 
                "{{carbon\Carbon::parse($location->campana->fecha_fin)->format('m/d/Y')}}"
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
                    labels: JSON.parse('{{ $labels }}'.replace(/&quot;/g,'"')),
                    datasets: [
                        @php 
                            $i = 0;
                        @endphp 
                        @foreach ($datos as $key=>$item)
                            {
                                label: '{{strtoupper("$key")}}',
                                data: {{ $item }},
                                borderColor: '{{ $colores[$i] }}',
                                fill: true,
                                hidden : true
                            },
                            @php 
                                $i++;
                            @endphp 
                        @endforeach
                    ]
                };

                var lineChartconfig = {
                    type: 'line',
                    options: linechartOptions,
                    data: linechartData
                };

                var lineChart = new Chart($("#line-chart"), lineChartconfig);
            });
        @endif

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

        function captura(){
            var caption = $('.input-daterange-datepicker').val();
            $('#caption-text').html(caption);
            html2canvas(document.getElementById("impr"), {
                dbi:192,
                onrendered: function(canvas){
                    $("#blank").attr('href', canvas.toDataURL("image/png"));
                    $("#blank").attr('download', caption + '.png');
                    $("#blank")[0].click();
                }
            });
        }                
    </script>
@endsection