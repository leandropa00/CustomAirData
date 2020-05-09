<?php $__env->startSection('page_title'); ?>
    <?php echo e("Airlab | Dotos"); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <style>
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 5px 0px 10px 0px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                             <?php if(isset($_REQUEST['act']) && $_REQUEST['act']=='1'): ?>
                          <div class="row">
                             <div class="col-12">
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Data Inserted successfully</strong>
                            </div>
                        </div>
                    </div>
                    <script>
                        setTimeout( function()  {window.location.href="dotos"; }, 1500);
                    </script>
                    <?php endif; ?>
                         <?php if($message = Session::get('success')): ?>
                          <div class="row">
                             <div class="col-12">
                        <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong><?php echo e($message); ?></strong>
                            </div>
                        </div>
                    </div>
                        <?php endif; ?>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Server Upload File List</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Table with outer spacing -->
                                    <div class="table-responsive">
                                          <?php 
                                                    $dir = public_path('datos');
                                                    $files = scandir($dir, 0);
                                                    if( count($files) <3) { ?>
                                                         <p class="card-text">No file found.</p>

                                               <?php  } else { ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>File Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 

                                                    for($i = 2; $i < count($files); $i++){ ?>
                                                      <tr>
                                                        <td><?php echo $files[$i]; ?></td>
                                                        </tr>
                                                      <?php  } ?>
                                               
                                            </tbody>
                                        </table>
                                      <div class="col-12">
                                <a href="<?php echo e(url('/')); ?>/upload_data.php" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Insert data to database </a>
                                    </div>
                                    <?php } ?>
                                   
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
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $("#file-upload").change(function(){
  $("#file-name").text(this.files[0].name);
});
</script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/server_upload.blade.php ENDPATH**/ ?>