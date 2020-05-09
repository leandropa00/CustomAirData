<?php echo $__env->make('layouts.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('css'); ?>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <!-- BEGIN: Header-->
         <?php echo $__env->yieldContent('content'); ?>
    <!-- BEGIN: Vendor JS-->
 <?php echo $__env->yieldContent('js'); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/layouts/iframemaster.blade.php ENDPATH**/ ?>