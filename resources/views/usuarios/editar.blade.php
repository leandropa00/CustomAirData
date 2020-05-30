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
                                    <h4 class="card-title">Actualizar usuario</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('users.update', $edit_user->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input maxlength="40" type="text" id="name" class="form-control" value="{{ $edit_user->name }}" name="name" placeholder="Ingresa el nombre del cliente" required>
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Correo electrónico</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input maxlength="30" type="email" id="email" class="form-control" value="{{ $edit_user->email }}" name="email" placeholder="Ingresa el correo electrónico" required>
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-mail"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Teléfono</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input id="phone" type="number" maxlength="10" class="form-control" name="phone" placeholder="Ingresa el teléfono" required autocomplete="phone" value="{{ $edit_user->telefono }}">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-phone"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if (Auth::user()->rol=='admin')
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>Empresa</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <select name="empresa" class="form-control" required>
                                                                        <option value="">Selecciona una empresa</option>
                                                                        @foreach ($empresas as $item)
                                                                            <option {{ $item->id == $edit_user->empresa_id ? 'selected' : '' }} value="{{$item->id}}">{{ucwords($item->nombre)}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <input type="hidden" name="empresa" value="{{Auth::user()->empresa->id}}">
                                                    @endif

                                                    <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label>Tipo de usuario</label>
                                                                <div class="position-relative has-icon-left">
                                                                    <select name="rol" id="rol" class="form-control select2" data-style="form-control">
                                                                        <option value="3" {{ $edit_user->rol == 'usuario' ? 'selected' : '' }}>Corriente</option>
                                                                        <option value="4" {{ $edit_user->rol == 'usuario basico' ? 'selected' : '' }}>Básico (Acceso solo al mapa)</option>
                                                                    </select>
                                                                    <div class="form-control-position">
                                                                        <i class="feather icon-user"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                    <input type="hidden" id="id" class="form-control" name="id" value="{{ $edit_user->id }}" >
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Actualizar</button>
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
<!-- END: Content-->
@endsection
