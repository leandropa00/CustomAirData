@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Consulta de datos</h4>
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
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Punto de monitoreo</label>
                                                            <select class="custom-select form-control" id="estacion" name="location_id">
                                                                <option value="">Escoge un punto de monitoreo</option>
                                                                @foreach($estaciones as $item)
                                                                    <option name="punto" value="{{$item->id}}" 
                                                                        data-start="{{carbon\Carbon::parse($item->campana->fecha_inicio)->format('m/d/Y')}}" 
                                                                        data-end="{{carbon\Carbon::parse($item->campana->fecha_fin)->format('m/d/Y')}}">
                                                                            {{ucfirst($item->alias)}} - {{ucfirst($item->campana->nombre)}} - {{ucfirst($item->campana->empresa->nombre)}}
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Rango de fechas</label>
                                                            <input class="form-control input-daterange-datepicker" type="text" id="dates" readonly/>
                                                        </div>
                                                    </div>

                                                    <div id="contaminantes"></div>

                                                </div>
                                            </div>
                                        </form>
                                        
                                        <div class="col-12">
                                            <button onclick="generate()" class="btn btn-primary mr-1 mb-1">Consultar</button>
                                            {{-- <button type="submit" formaction="{{ route('excel') }}" class="btn btn-warning mr-1 mb-1">Excel</button> --}}
                                            <a href="{{ route('consulta-de-datos') }}" class="btn btn-outline-warning mr-1 mb-1">Limpiar</a>
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
@endsection

@section('js')
    <!-- INI: Datepicker -->
    <script src="{{ asset('moment/moment.js') }}"></script>
    <script src="{{ asset('bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- END: Datepicker -->
    
    <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script>
        $('#estacion').change(function () { 
            $.blockUI({message: '<h1>Por favor espera...</h1>' });

            if (!$(this).val()) {
                $('.rango').val('');
                
            } else {
                var selected = $(this).find('option:selected');
                var inicio = selected.data('start'); 
                var fin = selected.data('end'); 

                $('.input-daterange-datepicker').daterangepicker({
                    format: 'DD/MM/YYYY',
                    buttonClasses: ['btn', 'btn-sm'],
                    minDate: inicio, 
                    maxDate: fin,
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

            url = "{{route('cargarContaminantes', ':id')}}";
            url = url.replace(':id', $(this).val());

            $.ajax({
                type: "get",
                url: url,
                success: function (response) {
                    $('#contaminantes').html(response);
                    $.unblockUI();
                }
            });           
        });

        function generate() {
            $.ajax({
                type: "get",
                url: "{{route('submit_filter')}}",
                data: $('#form').serialize(),
                success: function (response) {
                    $('#insertTable').html(response.html);
                    $('#titulo_pagina').html(response.nombre);
                    loadTable(response.contaminantes);
                }
            });
        }

        function loadTable(contaminantes){
            var id = $('#estacion').val();

            var dates = $('#dates').val().split(' - ');
            var start = dates[0];
            var end = dates[1];

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
                ajax: "{{route('cargarTabla')}}?id="+id+"&start="+start+"&end="+end,
                dom: 'Bfrtip',
                buttons: [
                    'excel'
                ],
                columns: columns,
            });
        }
    </script>
@endsection