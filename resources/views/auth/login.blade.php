<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <title>Ingreso a CustomAirData</title>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
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
                                        <div class="form-group"> <label class="form-control-label text-white">Correo</label> <input placeholder="Ingresa tu correo" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
                                        <div class="form-group"> <label class="form-control-label text-white">Contraseña</label> <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password"></div>
                                        <div class="row justify-content-center my-3 px-3"> <button class="btn btn-primary">Ingresar</button> </div>
                                        {{-- <div class="row justify-content-center my-2"> <a href="#"><small class="text-muted">¿Contraseña Olvidada?</small></a> </div> --}}
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
