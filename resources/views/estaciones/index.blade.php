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
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                @if ($message = Session::get('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Listado de estaciones</h4>
                                <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                    <a href="{{ route('estaciones.create') }}" class="btn btn-outline-warning">Crear una nueva estación</a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Serial</th>
                                                    <th>Nombre</th>
                                                    <th>Modelo</th>
                                                    <th>Fecha de creación</th>
                                                    <th>Observaciones</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($estaciones as $data)
                                                    <tr>
                                                        <td>{{ $data->serial }}</td>
                                                        <td>{{ ucwords($data->nombre) }}</td>
                                                        <td>{{ $data->modelo }}</td>
                                                        <td>{{ carbon\Carbon::parse($data->fecha_compra)->format('d-m-Y g:i A') }}</td>
                                                        <td>{{ $data->observaciones }}</td>
                                                        <td>
                                                            <button onclick="abrirModal({{$data->id}})" class="btn btn-icon btn-outline-primary waves-effect waves-light"><i class="feather icon-info"></i></button>                                                          
                                                            <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="{{ route('estaciones.edit', $data->id) }}"><i class="feather icon-edit"></i></a>
                                                            <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="{{ route('estaciones.destroy', $data->id) }}"><i class="feather icon-trash-2"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">No hay estaciones creadas</td>
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

<!-- END: Content-->
@endsection
@section('js')

<!-- BEGIN: Page Vendor JS-->
<!-- <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script> -->
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<!-- <script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script> -->
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="{{url('/')}}/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{url('/')}}/includes/app-assets/js/scripts/datatables/datatable.js"></script>
<script>
    function abrirModal(id){
        var url = "{{route('estaciones.show', ':id')}}"
        url = url.replace(':id', id);

        $.ajax({
            type: "get",
            url: url,
            success: function (response) {
                $("#modalDetalles").modal("show");                
                $("#modalDetallesLabel").html('Historial de '+response.titulo);                
                $("#modalDetallesBody").html(response.html);                   
            }
        });
    }
</script>

@endsection