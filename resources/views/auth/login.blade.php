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
                                        <div class="form-group"> <label class="form-control-label text-muted">Correo</label> <input placeholder="Ingresa tu correo" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
                                        <div class="form-group"> <label class="form-control-label text-muted">Contraseña</label> <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password"></div>
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
{{-- <body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header"><br><br>
				<div class="text-center">
                    <h3>CustomAirData</h3>
                </div>
				<div class="d-flex justify-content-end social_icon">
                    <span>
                        <a href="https://www.facebook.com/Airlab-Consulting-102390931473054" target="_blank" rel="noopener noreferrer" style="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </span>
					<span>
                        <a href="https://www.linkedin.com/company/49116067" target="_blank" rel="noopener noreferrer" style="">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </span>
					<span>
                        <a href="https://www.instagram.com/airlabconsulting/?hl=es-la" target="_blank" rel="noopener noreferrer" style="">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </span>
                    <span>
                        <a href="https://mobile.twitter.com/AirlabC" target="_blank" rel="noopener noreferrer" style="">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </span>
				</div>
            </div>
			<div class="card-body">
                @error('email')
                    <div class="alert alert-danger text-center" style="padding: 5px; margin 0px" role="alert">
                        <h6 style="font-size: 13px;margin-bottom: 0px">Credenciales erróneas, intenta nuevamente.</h6>
                    </div>
                @enderror
                <form method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input placeholder="Ingresa tu correo electrónico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control @error('email') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    
                    <div class="frow align-items-center remember">
                        <div class="text-left">
                            <fieldset class="checkbox">
                                <div class="vs-checkbox-con vs-checkbox-primary">
                                    <input type="checkbox">
                                    <span class="vs-checkbox">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <span class="">Recuérdame</span>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <button type="submit" class="btn float-right login_btn">Ingresar</button>
                </form>
			</div>
		</div>
	</div>
</div>
</body> --}}
</html>
{{-- <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Ingreso a CustomAirData</title>
    <link rel="apple-touch-icon" href="{{url('/')}}/includes/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/includes/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/includes/app-assets/css/themes/semi-dark-layout.css">

</head>

<body>
    <div class="page-wrapper">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0">
                <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                    <div class="d-flex align-items-center container p-0">
                        <div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9">
                            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                                <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                                <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
                            </a>
                        </div>
                        <a href="page_register.html" class="btn-link text-white ml-auto">
                            Create Account
                        </a>
                    </div>
                </div>
                <div class="flex-1" style="background: {{asset('css/pattern-1.svg')}} no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col col-md-6 col-lg-7 hidden-sm-down">
                                <h2 class="fs-xxl fw-500 mt-4 text-white">
                                    The simplest UI toolkit for developers &amp; programmers
                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                                        Presenting you with the next level of innovative UX design and engineering. The most modular toolkit available with over 600+ layout permutations. Experience the simplicity of SmartAdmin, everywhere you go!
                                    </small>
                                </h2>
                                <a href="#" class="fs-lg fw-500 text-white opacity-70">Learn more &gt;&gt;</a>
                                <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                    <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                                        Find us on social media
                                    </div>
                                    <div class="d-flex flex-row opacity-70">
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-facebook-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-google-plus-square"></i>
                                        </a>
                                        <a href="#" class="mr-2 fs-xxl text-white">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                    Secure login
                                </h1>
                                <div class="card p-4 rounded-plus bg-faded">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="username">Correo electrónico</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <div class="help-block">Ingresa tu correo electónico</div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>Credenciales erróneas, intenta nuevamente.</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Contaseña</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <div class="help-block">Ingresa tu contraseña</div>
                                        </div>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">Recuérdame</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right btn-inline">Ingresar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            2019 © SmartAdmin by&nbsp;<a href='https://www.gotbootstrap.com' class='text-white opacity-40 fw-500' title='gotbootstrap.com' target='_blank'>gotbootstrap.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/js/core/app-menu.js"></script>
    <script src="{{url('/')}}/includes/app-assets/js/core/app.js"></script>
    <script src="{{url('/')}}/includes/app-assets/js/scripts/components.js"></script>
</body>
</html> --}}
