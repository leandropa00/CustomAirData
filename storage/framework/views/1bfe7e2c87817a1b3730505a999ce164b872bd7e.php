<?php $__env->startSection('content'); ?>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <?php if($message = Session::get('failed')): ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('campanas.store')); ?>" method="post" id="form">
                        <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                            <div class="card collapse-icon accordion-icon-rotate">
                                <div class="card-content">
                                    <div class="card-body">

                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading1" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion1" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Datos básicos
                                                    </span>
                                                </div>
                                                <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label>Nombre del punto</label>
                                                                            <input type="text"class="form-control" name="nombre" placeholder="First Name" required>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label for="email-id-icon">Email</label>
                                                                            <select class="custom-select form-control" id="location1" name="location">
                                                                                <option value="new-york">New York</option>
                                                                                <option value="chicago">Chicago</option>
                                                                                <option value="san-francisco">San Francisco</option>
                                                                                <option value="boston">Boston</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
    
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="contact-info-icon">Descripcion del punto</label>
                                                                            <textarea class="form-control" id="basicTextarea" rows="1" placeholder="Textarea"></textarea>
                                                                        </div>
                                                                    </div>
    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading2" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion2" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Ubicación del punto
                                                    </span>
                                                </div>
                                                <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading3" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion3" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Fotos del punto
                                                    </span>
                                                </div>
                                                <div id="accordion3" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading4" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion4" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Niveles I a III
                                                    </span>
                                                </div>
                                                <div id="accordion4" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading5" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion5" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Nivel IV
                                                    </span>
                                                </div>
                                                <div id="accordion5" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading6" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion6" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Datos de logística
                                                    </span>
                                                </div>
                                                <div id="accordion6" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading7" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion7" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Criterios de microlocalización
                                                    </span>
                                                </div>
                                                <div id="accordion7" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-default collapse-bordered">
                                            <div class="card collapse-header">
                                                <div id="heading8" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion8" aria-expanded="false" aria-controls="accordion1">
                                                    <span class="lead collapse-title">
                                                        Personal de contacto
                                                    </span>
                                                </div>
                                                <div id="accordion8" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                                    <div class="card-content">
                                                        <div class="card-body">
    
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    FORM    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/campanas/crear.blade.php ENDPATH**/ ?>