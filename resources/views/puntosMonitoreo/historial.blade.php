@extends('layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Listado de puntos de monitoreo</h4>
                                @if (Auth::user()->rol=='admin')

                                @endif
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Alias</th>
                                                    <th>Estación</th>
                                                    <th>Campaña</th>
                                                    @if (Auth::user()->rol=='admin')
                                                        <th>Empresa</th>
                                                    @endif
                                                    <th>Fecha inicio</th>
                                                    <th>Fecha fin</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($puntosDeMonitoreo as $item)
                                                  <tr>
                                                    <td>{{ ucwords($item->alias) }}</td>
                                                    <td>{{ ucfirst($item->estacion->nombre) }}</td>
                                                    <td>{{ $item->campana->nombre }}</td>
                                                        @if (Auth::user()->rol=='admin')
                                                            <td>{{ $item->campana->empresa->nombre }}</td>
                                                        @endif
                                                    <td>{{ carbon\Carbon::parse($item->campana->fecha_inicio)->format('d/m/Y')}}</td>
                                                    <td>{{ carbon\Carbon::parse($item->campana->fecha_fin)->format('d/m/Y')}}</td>
                                                    <td>
                                                        <button onclick="abrirModal({{$item->id}})" class="btn btn-icon btn-outline-primary waves-effect waves-light"><i class="feather icon-info"></i></button>                                                          
                                                        <a class="btn btn-icon btn-outline-secondary waves-effect waves-light" target="_blank" href="{{route('puntos-monitoreo.imprimir', $item->id)}}"><i class="feather icon-printer"></i></a>
                                                        <a class="btn btn-icon btn-outline-vimeo waves-effect waves-light" href="{{ route('puntos-monitoreo.contaminantes', $item->id) }}"><i class="feather icon-wind"></i></a>
                                                        @if (Auth::user()->rol=='admin')
                                                            @if ($item->carga_automatica == '0')
                                                                <button onclick="modalCarga({{$item->id}})" class="btn btn-icon btn-outline-dark waves-effect waves-light"><i class="feather icon-upload"></i></button>                                                          
                                                            @endif
                                                            <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="{{ route('puntos-monitoreo.edit', $item->id) }}"><i class="feather icon-edit"></i></a>
                                                            <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="{{ route('puntos-monitoreo.destroy', $item->id) }}"><i class="feather icon-trash-2"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">No hay puntos de monitoreo creados</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetallesLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDetallesBody">
                Cargando...
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCargaLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalCargaBody">
                Cargando...
            </div>
        </div>
    </div>
</div>


<!-- END: Content-->
@endsection
@section('js')

<!-- BEGIN: Page Vendor JS-->
{{-- <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script> --}}
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
{{-- <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script> --}}
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
<script src="{{url('/')}}/includes/app-assets/js/scripts/datatables/datatable.js"></script>
<script>
    function abrirModal(id){
        var url = "{{route('puntos-monitoreo.show', ':id')}}";
        url = url.replace(':id', id);

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                $("#modalDetalles").modal("show");                
                $("#modalDetallesLabel").html('Detalles de '+response.titulo);                
                $("#modalDetallesBody").html(response.html);                   
            }
        });
    }

    function modalCarga(id){
        var url = "{{route('puntos-monitoreo.modalCargaManual', ':id')}}";
        url = url.replace(':id', id);

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                $("#modalCarga").modal("show");                
                $("#modalCargaLabel").html('Carga manual de datos para '+response.titulo);                
                $("#modalCargaBody").html(response.html);                   
            }
        });
    }

    function imprimir(id){
        var url = "{{route('puntos-monitoreo.imprimir', ':id')}}";
        url = url.replace(':id', id)
        window.open(url);
    }
    
</script>
@endsection