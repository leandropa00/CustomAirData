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
                                    <h4 class="card-title">Crear usuario</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                              
                                        <form class="form form-vertical" method="POST" action="{{ route('users.store') }}">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input id="name" minlength="3" maxlength="40" type="text" class="form-control" name="name" autocomplete="name" required placeholder="Ingresa un nombre para el usuario" >
                                                                
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
                                                                <input id="email" type="email" maxlength="30" class="form-control" name="email" placeholder="Ingresa el correo electrónico" required autocomplete="email">
                                                                
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
                                                                <input id="phone" type="number" maxlength="10" class="form-control" name="phone" placeholder="Ingresa el teléfono" required autocomplete="phone">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-phone"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Empresa</label>
                                                            <div class="position-relative has-icon-left">
                                                                <select name="empresa" class="form-control" required>
                                                                    <option value="">Selecciona una empresa</option>
                                                                    @foreach ($empresas as $item)
                                                                        <option value="{{$item->id}}">{{ucwords($item->nombre)}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label>Tipo de usuario</label>
                                                            <div class="position-relative has-icon-left">
                                                                <select name="rol" id="rol" class="form-control select2" data-style="form-control">
                                                                    <option value="">Seleccione tipo de usuario</option>
                                                                    <option value="4">Básico</option>
                                                                    <option value="3">Intermedio</option>
                                                                    <option value="2">Avanzado</option>
                                                                </select>
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-user"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Contraseña</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input id="password" type="password" minlength="8" maxlength="20" class="form-control" name="password" placeholder="Ingresa una contraseña" required autocomplete="new-password">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-lock"></i>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>Confirma tu contraseña</label>
                                                            <div class="position-relative has-icon-left">
                                                                <input onblur="validation();" minlength="8" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma tu contraseña" required autocomplete="new-password">
                                                                
                                                                <div class="form-control-position">
                                                                    <i class="feather icon-lock"></i>
                                                                </div>

                                                                <span class="invalid-feedback" role="alert" style="display:none;" id="repass_error">No coincide con la contraseña ingresada</span>                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="col-12">
                                                        <button type="submit" id="submit_btn" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
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

@section('js')
    <script>
        function validation()
        {
            var pass=$("#password").val();
            var re_pass=$("#password-confirm").val();

            if (pass != re_pass)
            {
                $("#repass_error").show();
                $("#submit_btn").hide();

            } else{
                $("#password-confirm").removeClass('is-invalid');
                $("#repass_error").hide();
                $("#submit_btn").show();

            }
        }
    </script>
@endsection