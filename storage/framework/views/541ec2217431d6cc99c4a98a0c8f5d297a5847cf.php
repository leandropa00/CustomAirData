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
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input placeholder="Ingresa tu correo electrónico" id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                    </div>
                    
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
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
</body>
</html>

<?php /**PATH /home/logjanec/public_html/customair/resources/views/auth/login.blade.php ENDPATH**/ ?>