@extends('layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
@endsection
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay">
    </div>
    <div class="header-navbar-shadow">
    </div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
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
                                <h4 class="card-title">Listado de campañas</h4>
                                @if (Auth::user()->rol=='admin')
                                    <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                        <a href="{{route('campanas.create')}}" class="btn btn-outline-warning">Crear una nueva campaña</a> 
                                    </div>
                                @endif
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    @if (Auth::user()->rol=='admin')
                                                        <th>Empresa</th>
                                                    @endif
                                                    <th>Fecha de inicio</th>
                                                    <th>Fecha de fin</th>
                                                    <th>Descripción</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($campanas as $item)
                                                    <tr>
                                                        <td>{{ucfirst($item->nombre)}}</td>
                                                        @if (Auth::user()->rol=='admin')
                                                            <td>{{ucfirst($item->empresa->nombre)}}</td>
                                                        @endif
                                                        <td>{{ carbon\Carbon::parse($item->fecha_inicio)->format('d/m/Y')}}</td>
                                                        <td>{{ carbon\Carbon::parse($item->fecha_fin)->format('d/m/Y')}}</td>
                                                        <td>{{ucfirst($item->observaciones)}}</td>
                                                        <td>
                                                            <a class="btn btn-icon btn-outline-primary waves-effect waves-light" href="{{ route('puntos-monitoreo.index', $item->id) }}"><i class="feather icon-server"></i></a>
                                                            @if (Auth::user()->rol=='admin')
                                                                <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="{{ route('campanas.edit', $item->id) }}"><i class="feather icon-edit"></i></a>
                                                                <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="{{ route('campanas.destroy', $item->id) }}"><i class="feather icon-trash-2"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td {{ Auth::user()->rol=='admin' ? "colspan=6" : "colspan=5" }} class="text-center">No hay campañas creadas</td>
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

@endsection