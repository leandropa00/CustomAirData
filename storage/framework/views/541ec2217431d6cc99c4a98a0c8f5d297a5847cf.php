<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
    <head>
        <title>Ingreso a CustomAirData</title>
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
    <body class="body">
        <div class="container px-4 py-5 mx-auto">
            <div class="row">
                <div class="card2">
                    <div class="my-auto mx-md-6 px-md-5 right text-format">
                        <small class="text-format">Nuestro entorno enfrenta muchos desafíos. Es por eso que necesitamos colaborar para ayudar a abordar las necesidades de hoy y lo que es más importante, para imaginar y crear soluciones para el futuro.</small>
                    </div>
                </div>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card3">
                        <div class="d-flex flex-lg-row flex-column-reverse">
                            <div class="card-body">
                                <div class="row justify-content-center my-auto">
                                    <div class="col-md-8 col-10 my-5">
                                        <h3 class="mb-5 text-center heading">Ingresar</h3>
                                        <h6 class="msg-info text-center">Por favor ingresa a tu perfil</h6>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger text-center" style="padding: 5px; margin 0px" role="alert">
                                                <h6 style="font-size: 13px;margin-bottom: 0px">Credenciales erróneas</h6>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="form-group"> <label class="form-control-label text-muted">Correo</label> <input placeholder="Ingresa tu correo" id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus></div>
                                        <div class="form-group"> <label class="form-control-label text-muted">Contraseña</label> <input placeholder="Ingresa tu contraseña" id="password" type="password" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password"></div>
                                        <div class="row justify-content-center my-3 px-3"> <button class="btn btn-primary">Ingresar</button> </div>
                                        
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

<?php /**PATH /home/logjanec/public_html/customair/resources/views/auth/login.blade.php ENDPATH**/ ?>