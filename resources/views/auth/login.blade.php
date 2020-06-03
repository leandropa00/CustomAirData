<!DOCTYPE html>
<html>
    <head>
        <title>Ingreso a CustomAirData</title>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <style>
            a {
                text-decoration: none; 
                color: #FFC312;
            }
            a:hover {
                color: white;
            }
        </style>
    </head>
    <body class="body">
        <div class="container px-4 py-5 mx-auto">
            @if($errors->first('success'))
                <div class="alert alert-success alert-dismissible fade show text-center">
                    {{ $errors->first('success') }}
                </div>
            @endif
            <div class="row">
                <div class="card2">
                    <div class="my-auto mx-md-6 px-md-5 right text-format">
                        <small class="text-format">Nuestro entorno enfrenta muchos desafíos. Es por eso que necesitamos colaborar para ayudar a abordar las necesidades de hoy y lo que es más importante, para imaginar y crear soluciones para el futuro.</small>
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card3">
                        <div class="d-flex flex-lg-row flex-column-reverse">
                            <div class="card-body">
                                <div class="row justify-content-center my-auto">
                                    <div class="col-md-8 col-10 my-5">
                                        <h3 class="mb-5 text-center heading">Ingresar</h3>
                                        <h6 class="msg-info text-center">Por favor ingresa a tu perfil</h6>
                                        @error('email')
                                            <div class="alert alert-danger text-center" style="padding: 5px; margin 0px" role="alert">
                                                <h6 style="font-size: 13px;margin-bottom: 0px">Credenciales erróneas</h6>
                                            </div>
                                        @enderror
                                        <div class="form-group"> 
                                            <label class="form-control-label text-white">Correo</label> 
                                            <input placeholder="Ingresa tu correo" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="form-group"> 
                                            <label class="form-control-label text-white">Contraseña</label> 
                                            <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        </div>
                                        <div class="row justify-content-center my-3 px-3"> <button class="btn btn-primary">Ingresar</button> </div>
                                        <div class="row justify-content-center my-2"> <a data-toggle="modal" data-target="#myModal"><small class="text-muted">¿Olvidaste tu contraseña?</small></a> </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                
                    <div class="modal-header">
                        <h4 class="modal-title centered">Recupera tu contraseña...</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <div class="modal-body">
                        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error">
                            El correo ingresado es inválido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error2">
                            El código de verificación ingresado es inválido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="success">
                            Revisa tu teléfono e ingresa el código a continuación
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="modal-body">
                            <form id="form-pass">
                                <div class="form-group"> 
                                    <input placeholder="Ingresa tu correo electrónico" type="email" class="form-control" name="email" id="email2" required autocomplete="email" autofocus>
                                </div>
                                <input type="hidden" name="codigo" id="codigo">
                            </form>
                            <div style="text-align: center">
                                <button class="btn btn-info" id="sendForm">Recibir SMS de verificación</button>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </body>

    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        var codigo;
        var correo;
        $('#sendForm').click(function (e) { 
            codigo = Math.floor(1000 + Math.random() * 9000)
            $('#codigo').val(codigo)
            $.ajax({
                type: "get",
                url: "{{route('recuperarContrasena')}}",
                data: $('#form-pass').serialize(),
                success: function (res) {
                    $('.alert').addClass('d-none')
                    
                    if (res == 'success'){
                        correo = $('#email2').val();
                        $('#'+res).removeClass('d-none')
                        $('#modal-body').empty();
                        $('#modal-body').html(
                            `<div class="form-group"> 
                                <input placeholder="Ingresa tu código de verificación" type="text" class="form-control" id="codigoIngresado" required autofocus>
                            </div>
                            <div style="text-align: center">
                                <button class="btn btn-info" onclick="validarCódigo()">Validar mi código</button>
                            </div>`
                        );
                    } else
                        $('#'+res).removeClass('d-none')
                }
            });
        });
        
        function validarCódigo() {
            
            $('.alert').addClass('d-none')

            if($('#codigoIngresado').val() == codigo){
                $('#modal-body').empty();
                $('#modal-body').html(
                    `<form action="{{route('cambiarContrasena')}}" method="POST">
                        @csrf
                        <input type="hidden" name="email" value="${correo}">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Nueva contraseña</label>
                                <div class="position-relative has-icon-left">
                                    <input id="password2" type="password" minlength="8" class="form-control" name="password" placeholder="Ingresa una nueva contraseña" required>
                                    <div class="form-control-position">
                                        <i class="feather icon-lock"></i>
                                    </div>
                                    <span class="invalid-feedback" role="alert" style="display:none;" id="pass_length">Debe tener al menos 8 caracteres</span>                        
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Confirma tu contraseña</label>
                                <div class="position-relative has-icon-left">
                                    <input onblur="validation()" minlength="8" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma tu nueva contraseña" required>
                                    <div class="form-control-position">
                                        <i class="feather icon-lock"></i>
                                    </div>
                                    <span class="invalid-feedback" role="alert" style="display:none;" id="repass_error">No coincide con la contraseña ingresada</span>                        
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center">
                            <button class="btn btn-info" id="submit_btn">Cambiar contraseña</button>
                        </div>
                    </form>`
                );
            } else {
                $('#error2').removeClass('d-none')                   
            }
        }

        function validation()
        {
            var pass=$("#password2").val();
            var re_pass=$("#password-confirm").val();

            if (pass == re_pass)
            {
                $("#password-confirm").removeClass('is-invalid');
                $("#repass_error").hide();
                $("#submit_btn").show();
                
            } else{
                $("#repass_error").show();
                $("#submit_btn").hide();
            }
        }
    </script>
</html>