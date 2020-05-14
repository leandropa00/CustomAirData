@extends('layouts.master')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    @if ($message = Session::get('failed'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editando {{$empresa->nombre}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                              
                                        <form class="form form-vertical" action="{{ route('empresas.update', $empresa->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="PUt">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input minlength="3" maxlength="50" type="text" class="form-control" name="nombre" autocomplete="nombre" value="{{$empresa->nombre}}" required placeholder="Ingresa el nombre de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>NIT</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input type="number" class="form-control" name="nit" autocomplete="nit" value="{{$empresa->nit}}" required placeholder="Ingresa el NIT de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-credit-card"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Teléfono</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input minlength="7" maxlength="20" type="number" class="form-control" name="telefono" autocomplete="telefono" value="{{$empresa->telefono}}" required placeholder="Ingresa el teléfono de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-phone"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Correo</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input maxlength="30" type="email" class="form-control" name="correo" autocomplete="correo" value="{{$empresa->correo}}" required placeholder="Ingresa el correo electrónico de la empresa">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Dirección</label>
                                                            <div class="position-relative has-icon-left">
                                                                <textarea maxlength="15" class="form-control" name="direccion" autocomplete="direccion" required placeholder="Ingresa la dirección de la empresa">{{$empresa->direccion}}</textarea>
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-map-pin"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-12">
                                                        <button type="submit" id="submit_btn" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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