<?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- END: Head-->

<!-- BEGIN: Body-->
<?php echo $__env->yieldContent('css'); ?>
<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">
    <!-- BEGIN: Header-->
    <?php echo $__env->make('layouts.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

         <?php echo $__env->yieldContent('content'); ?>
    <!-- BEGIN: Vendor JS-->
   
 <?php echo $__env->make('layouts.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->yieldContent('js'); ?><?php /**PATH /Applications/AMPPS/www/customair/resources/views/layouts/master.blade.php ENDPATH**/ ?>