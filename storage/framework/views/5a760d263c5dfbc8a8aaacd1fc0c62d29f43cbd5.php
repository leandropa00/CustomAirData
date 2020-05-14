<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/includes/app-assets/vendors/css/tables/datatable/datatables.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Column selectors with Export Options and print table -->
            <section id="column-selectors">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Campanas</h4>

                                <div class="modal-size-lg mr-1 mb-1 d-inline-block">

                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#large">
                                        Add Campanas
                                    </button>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                </tr>
                                                <tr>
                                                    <td>Brielle Williamson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>2012/12/02</td>
                                                    <td>$372,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Herrod Chandler</td>
                                                    <td>Sales Assistant</td>
                                                    <td>San Francisco</td>
                                                    <td>59</td>
                                                    <td>2012/08/06</td>
                                                    <td>$137,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Rhona Davidson</td>
                                                    <td>Integration Specialist</td>
                                                    <td>Tokyo</td>
                                                    <td>55</td>
                                                    <td>2010/10/14</td>
                                                    <td>$327,900</td>
                                                </tr>

                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>2011/06/27</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>2011/01/25</td>
                                                    <td>$112,000</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
<!-- Column selectors with Export Options and print table -->
<!---- MODEL POPUP ----------------->

<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Agregar Punto De Monitoreo (JOSE LUIS LOPEZ PARRA)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <section id="accordion">

                <div id="accordionWrapa1" role="tablist" aria-multiselectable="true">
                    <div class="card collapse-icon accordion-icon-rotate">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="accordion-default collapse-bordered">
                                    <div class="card collapse-header">
                                        <div id="heading1" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion1" aria-expanded="false" aria-controls="accordion1">
                                            <span class="lead collapse-title">
                                                Datos basicos
                                            </span>
                                        </div>
                                        <div id="accordion1" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading1" class="collapse">
                                            <div class="card-content">
                                                <div class="card-body">

                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="first-name-icon">Nombre del punto</label>

                                                                    <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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
                                                            <div class="col-6">
                                                            </div>
                                                             <div class="col-6">
                                                                <div class="form-group text-right">
                                                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light ">Save</button>

                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card collapse-header">
                                        <div id="heading2" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion2" aria-expanded="false" aria-controls="accordion2">
                                            <span class="lead collapse-title">
                                               Unicacion del punto
                                           </span>
                                       </div>
                                       <div id="accordion2" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading2" class="collapse" aria-expanded="false">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="first-name-icon">Nombre del punto</label>

                                                                <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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

                                                                <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card collapse-header">
                                    <div id="heading3" class="card-header collapse-header" data-toggle="collapse" role="button" data-target="#accordion3" aria-expanded="false" aria-controls="accordion3">
                                        <span class="lead collapse-title">
                                            Fotos del punto
                                        </span>
                                    </div>
                                    <div id="accordion3" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading3" class="collapse" aria-expanded="false">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="first-name-icon">Nombre del punto</label>

                                                                <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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

                                                                <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card collapse-header">
                                    <div id="heading4" class="card-header" data-toggle="collapse" role="button" data-target="#accordion4" aria-expanded="false" aria-controls="accordion4">
                                        <span class="lead collapse-title">
                                           Niviles 1 and 111
                                       </span>
                                   </div>
                                   <div id="accordion4" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading4" class="collapse" aria-expanded="false">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="first-name-icon">Nombre del punto</label>

                                                            <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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

                                                            <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card collapse-header">
                                <div id="heading5" class="card-header" data-toggle="collapse" role="button" data-target="#accordion5" aria-expanded="false" aria-controls="accordion5">
                                    <span class="lead collapse-title">
                                      Niviles 1V
                                  </span>
                              </div>
                              <div id="accordion5" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading5" class="collapse" aria-expanded="false">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Nombre del punto</label>

                                                        <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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

                                                        <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card collapse-header">
                            <div id="heading6" class="card-header" data-toggle="collapse" role="button" data-target="#accordion6" aria-expanded="false" aria-controls="accordion6">
                                <span class="lead collapse-title">
                                   Datos de logistica
                               </span>
                           </div>
                           <div id="accordion6" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading6" class="collapse" aria-expanded="false">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="first-name-icon">Nombre del punto</label>

                                                    <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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

                                                    <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card collapse-header">
                        <div id="heading7" class="card-header" data-toggle="collapse" role="button" data-target="#accordion7" aria-expanded="false" aria-controls="accordion7">
                            <span class="lead collapse-title">
                               Criterios de Microlocalization
                           </span>
                       </div>
                       <div id="accordion7" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading7" class="collapse" aria-expanded="false">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-icon">Nombre del punto</label>

                                                <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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

                                                <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card collapse-header">
                    <div id="heading8" class="card-header" data-toggle="collapse" role="button" data-target="#accordion8" aria-expanded="false" aria-controls="accordion8">
                        <span class="lead collapse-title">
                           Personal de contacto
                       </span>
                   </div>
                   <div id="accordion8" role="tabpanel" data-parent="#accordionWrapa1" aria-labelledby="heading8" class="collapse" aria-expanded="false">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="first-name-icon">Nombre del punto</label>

                                            <input type="text" id="first-name-icon" class="form-control" name="fname-icon" placeholder="First Name">
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
                                            
                                            <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"></textarea>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</section>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
</div>
</div>
</div>
</div>

<!-----MODELO POOPUP -------------->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/datatables/datatable.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/campanas.blade.php ENDPATH**/ ?>