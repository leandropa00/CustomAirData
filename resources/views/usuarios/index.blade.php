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
                                <h4 class="card-title">Listado de usuarios</h4>
                            <div class="modal-size-lg mr-1 mb-1 d-inline-block">
                                    <a href="{{ route('users.create') }}" class="btn btn-outline-warning">Crear un nuevo usuario</a>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                    <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Recibe mensajes</th>
                                                    <th>Empresa</th>
                                                    <th>Tipo de usuario</th>
                                                    <th>Fecha de creación</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users_data as $data)
                                                  <tr>
                                                    <td>{{ ucwords($data->name) }}</td>
                                                    <td>{{ $data->email }}</td>
                                                    <td>{{ $data->telefono }}</td>
                                                    <td>
                                                        <select onchange="cambiarPermisosSms({{ $data->id }}, this.value)" class="form-control">
                                                            <option value="0" @if($data->recibe_mensajes == 0) selected @endif>No</option>
                                                            <option value="1" @if($data->recibe_mensajes == 1) selected @endif>Sí</option>
                                                        </select>
                                                    </td>
                                                    <td>{{ ucfirst($data->empresa->nombre) }}</td>
                                                    <td>{{ ucfirst($data->rol) }}</td>
                                                    <td>{{ carbon\Carbon::parse($data->created_at)->format('d-m-Y g:i A') }}</td>
                                                    <td>
                                                        <a class="btn btn-icon btn-outline-warning waves-effect waves-light" href="{{ route('users.edit', $data->id) }}"><i class="feather icon-edit"></i></a>
                                                        <a class="btn btn-icon btn-outline-danger waves-effect waves-light" href="{{ route('users.destroy', $data->id) }}"><i class="feather icon-trash-2"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">No hay usuarios creados</td>
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
    function cambiarPermisosSms(id, permiso) { 
        var url = "{{route('users.permisos-sms', ':id')}}";
        url = url.replace(':id', id);

        $.ajax({
            type: "PUT",
            url: url,
            data: {
                '_token': '{{csrf_token()}}',
                'permiso': permiso
            }
        });
    }
</script>

@endsection