<?php $__env->startSection('content'); ?>
        <!-- BEGIN: Content-->
    <style>

        ::-webkit-scrollbar {
            display: none;
        }
        
        .gm-style-iw.gm-style-iw-c {
            width: 1200px!important;
            padding: 0!important;
        }

        .gm-style-iw-d {
            width: 100%!important;
            background-color: #f8f8f8;
        }

        .h_heading, .h_text {
            font-size:12px;
        }

    </style>

    <div class="app-content content">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>

        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                        <h2 class="content-header-title float-left mb-0"></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <!-- gmaps Examples section start -->
                <section id="gmaps-basic-maps">
                    <!-- Info Window -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Puntos de monitoreo</h4>
                                </div>

                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text"></p>
                                        <div id="info-window" class="height-600"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- gmaps Examples section End -->
            </div>
        </div>
    </div>

    <!--model-->
    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document" style="margin-top: 100px;max-width:950px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color:black">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="map-responsive">
                    <iframe id="ifrm" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <!-- BEGIN: Page Vendor JS-->
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBgjNW0WA93qphgZW-joXVR6VC3IiYFjfo"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/charts/gmaps.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/core/app.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/charts/chart.min.js"></script>
    <!-- BEGIN: Page JS-->
 
<script>

    var markers = [

        <?php $__empty_1 = true; $__currentLoopData = $puntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        {
            "title": '<?php echo e(ucfirst($item->alias) . " - " . ucfirst($item->campana->nombre) . " - " . ucfirst($item->campana->empresa->nombre)); ?>',
            "lat": '<?php echo e($item->latitud); ?>',
            "lng": '<?php echo e($item->longitud); ?>',
            "description": html(<?php echo e($item->id); ?>)
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>

    ];

    function html(id) {
        var html;
        var url = "<?php echo e(route('mapChart', ':id')); ?>";
        url = url.replace(':id', id);

        $.ajax({
            async: false,
            type: "get",
            url: url,
            success: function (res) {
                html = res;   
            }
        });
        return html;
    }

    window.onload = function () {

        var mapOptions = {

            center: new google.maps.LatLng(4.535000, -75.675690),
            zoom:7,
            mapTypeId: google.maps.MapTypeId.HYBRID,
            closeBoxMargin: "200px 20px 2px 2px"

        };

        var infoWindow = new google.maps.InfoWindow();
        var latlngbounds = new google.maps.LatLngBounds();
        var map = new google.maps.Map(document.getElementById("info-window"), mapOptions);
        var i = 0;

        var interval = setInterval(function () {

            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({

                position: myLatlng,
                map: map,
                title: data.title,
                animation: google.maps.Animation.DROP

            });

            (function (marker, data) {

                google.maps.event.addListener(marker, "click", function (e) {

                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);

                });

            })(marker, data);

            latlngbounds.extend(marker.position);

            i++;

            if (i == markers.length) {

                clearInterval(interval);
                var bounds = new google.maps.LatLngBounds();
                map.setCenter(latlngbounds.getCenter());
                map.fitBounds(latlngbounds);

            }

        }, 80);

    }

    function get_chart(loc_id,val,conv){
        $(".prev_button").css('display','flex');
        $("#pre_loc_id").val(loc_id);
        $("#pre_val").val(val);
        $('#crtifrm').attr('src', "<?php echo e(url('/')); ?>/get_chart/"+loc_id+"/"+val+"/"+conv);   
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/mapa/index.blade.php ENDPATH**/ ?>