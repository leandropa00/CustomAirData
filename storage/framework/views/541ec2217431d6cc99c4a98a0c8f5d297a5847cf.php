<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Ingreso a CustomAirData</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
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
<body>
    <div class="container">
        <div >
            <div class="loginMsg">
                <div class="textcontent">
                    <!-- <p class="title">Don't have an account?</p> -->
                    <p>Nuestro entorno enfrenta muchos desafíos. Es por eso que necesitamos colaborar para ayudar a abordar las necesidades de hoy y lo que es más importante, para imaginar y crear soluciones para el futuro.</p>
                </div>
            </div>
        </div>
        <!-- backbox -->
        
        <div class="frontbox">
            <div class="login">
                <h2>Ingresar</h2>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger text-center" style="padding: 5px; margin 0px" role="alert">
                        <h6 style="font-size: 13px;margin-bottom: 0px">Credenciales erróneas, intenta nuevamente.</h6>
                    </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                        <div class="inputbox">
                            <h6>Correo electrónico</h6>
                            <input placeholder="Ingresa tu correo electrónico" id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            <h6>Contraseña</h6>
                            <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                        </div>
                        <button type="submit" class="btn float-right login_btn">Ingresar</button>
                </form>
            </div>
        </div>
        <!-- frontbox -->
    </div>
    <script src="js/login.js"></script>
    <!-- Style Switcher Start -->
    </body>

</html>

<?php /**PATH /home/logjanec/public_html/customair/resources/views/auth/login.blade.php ENDPATH**/ ?>