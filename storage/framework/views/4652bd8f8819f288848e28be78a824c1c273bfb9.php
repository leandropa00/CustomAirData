<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/')); ?>/includes/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .form-group {
    margin-bottom: 1rem;
}
body
{
  background-color:black !important;  
}
.card {
    margin-bottom: 0rem !important;
    }
label,h4{
    color:white;
}

.form-group {
    margin-bottom: 0.3rem;
}

.chk-txt
{
    color:white !important;
}
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content" style="margin-left: 0px;background-color:black;">
        <div class="content-wrapper" style="margin-top: 0rem; ">
            <div class="content-body"  style="background-color:black;margin-top:-5%">
                <section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header" style="background-color:black">
                            <h4 class="card-title">Filtrar por nombre</h4> 
                        </div>
                                <div class="card-content">
                                    <div class="card-body" style="background-color:black">
                                        <form class="form form-vertical" action="<?php echo e(route('iframe_submit_filter.post')); ?>" method="post" >
                                        	 <?php echo csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="from_date">From Date</label>
                                                            <input type="text" id="from_date" class="form-control pickadate" name="from_date" placeholder="From Date" value="<?php if($from_date!=''){ echo date('d F, Y',strtotime($from_date)); } ?> ">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="to_date">To Date</label>
                                                            <input type="text" id="to_date" class="form-control pickadate" name="to_date" placeholder="To Date" value="<?php if($to_date!=''){ echo date('d F, Y',strtotime($to_date)); } ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">Estacion</label>
                                                           <select class="custom-select form-control" id="estacion" name="location_id">
                                                          <?php $__currentLoopData = $location_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          
                                                            <option value="<?php echo e($row->id); ?>"><?php echo e($row->location_name); ?></option>
                                                            
                                                            
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                     <div class="col-12">
                                                    <h4 class="card-title">Contaminantes</h4>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="pm10" value="1" <?php
                                              echo  isset($arr2['pm10']) && $arr2['pm10']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">PM10</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                             <input type="checkbox" name="pm25" value="1" <?php
                                              echo  isset($arr2['pm25']) && $arr2['pm25']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">PM25</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                         <input type="checkbox"  name="tsp" value="1" <?php
                                              echo  isset($arr2['tsp']) && $arr2['tsp']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">TSP</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="so2" <?php
                                              echo  isset($arr2['so2']) && $arr2['so2']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">SO2</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="o3" <?php
                                              echo  isset($arr2['o3']) && $arr2['o3']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">O3</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="co" <?php
                                              echo  isset($arr2['co']) && $arr2['co']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">CO</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="no" <?php
                                              echo  isset($arr2['no']) && $arr2['no']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">NO</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                     <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="no2" <?php
                                              echo  isset($arr2['no2']) && $arr2['no2']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">NO2</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                     <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="nox" <?php
                                              echo  isset($arr2['nox']) && $arr2['nox']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">NOx</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                     <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="dv" <?php
                                              echo  isset($arr2['dv']) && $arr2['dv']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">DV</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="vv" <?php
                                              echo  isset($arr2['vv']) && $arr2['vv']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">VV</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="hr" <?php
                                              echo  isset($arr2['hr']) && $arr2['hr']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">HR</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="temp" <?php
                                              echo  isset($arr2['temp']) && $arr2['temp']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">TEMP</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="pb" <?php
                                              echo  isset($arr2['pb']) && $arr2['pb']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">PB</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="rs" <?php
                                              echo  isset($arr2['rs']) && $arr2['rs']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">RS</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="humedad_int" <?php
                                              echo  isset($arr2['humedad_int']) && $arr2['humedad_int']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Humedad Int</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="temp_int" <?php
                                              echo  isset($arr2['temp_int']) && $arr2['temp_int']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Temp Int</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-2">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="rain" <?php
                                              echo  isset($arr2['rain']) && $arr2['rain']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Rain</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="form-group col-4">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="1" name="vel_aspiracion" <?php
                                              echo  isset($arr2['vel_aspiracion']) && $arr2['vel_aspiracion']=="1" ? 'checked': ''; ?>>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="">Vel Aspiracion</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <input type="hidden" id="loc_id" name="loc_id" value="<?php echo e($loc_id); ?>"/>
                                                    <div class="form-group col-8">
                                                        <button type="submit" style="float: right;" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
					if(isset($arr_json)) 
					{ ?>
                 <section id="chartjs-charts" style="background-color:black">
                    <!-- Line Chart -->
                    <div class="row">
                         <div class="col-md-12">
                            <div class="card" style="background-color:black">
                                <div class="card-header" style="background-color:black">
                                    <h4 class="card-title">AirLab Chart </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pl-0">
                                        <div >
                                            <canvas id="line-chart" style="background-color:black;height:250px"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Bar Chart -->  
                    </div>
                </section>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
   <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/core/app.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->
    <!-- END: Page JS-->

    <!-- BEGIN Vendor JS-->
  <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(url('/')); ?>/includes/app-assets/vendors/js/charts/chart.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
<script>
 
<?php
if(isset($arr_json)) 

{ 

$arr_json = json_decode($arr_json,true);
   $col = array();
 $col[] = '#f76e0f';
    $col[] = '#f76e0f';
   $col[] = '#28C76F';
   $col[] = '#EA5455';
   $col[] = '#FF9F43';
   $col[] = '#fbdc7f';
   $col[] = '#dae1e7';
   $col[] = '#f10606';
   $col[] = '#2196f3';
   $col[] = '#795548';
   $col[] = '#9c27b0';
   
   
   $col[] = '#775959';
   $col[] = '#459c59';
   $col[] = '#0d6521';
   $col[] = '#7f63b1';
   $col[] = '#93a7e4';
   $col[] = '#40867f';
   $col[] = '#8d6e92';
   $col[] = '#d7ea1d';
   $col[] = '#d7ea1d';
   $col[] = '#d7ea1d';
   
?>

  var $primary = '#f76e0f';
  var $success = '#28C76F';
  var $danger = '#EA5455';
  var $warning = '#FF9F43';
  var $label_color = '#fbdc7f';
  var grid_line_color = '#dae1e7';

  var themeColors = [$primary, $success, $danger, $warning, $label_color];

  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx = $("#line-chart");

  // Chart Options
  var linechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'top',
    },
    hover: {
      mode: 'label'
    },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }]
    },
    title: {
      display: true,
      text: '<?php if($location_name!=''){ echo $location_name; } ?> | <?php if($from_date!=''){ echo date('d F, Y',strtotime($from_date)); } ?> - <?php if($to_date!=''){ echo date('d F, Y',strtotime($to_date)); } ?>'
    }
  };

  // Chart Data
  var linechartData = {
   // labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
    labels: <?php if(isset($arr_json["date"]))  { echo json_encode($arr_json["date"]); } ?>,
    datasets: [


<?php

$i=0;

 $max_field=count($arr_json);

foreach($arr_json as $k=>$v)
{
	$i++;
	if($i==1) continue;

	print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "'.$col[$i].'",
      fill: false
    }');

    if($i!=$max_field) echo ",";
}


?>]
  };

  var lineChartconfig = {
    type: 'line',

    // Chart Options
    options: linechartOptions,

    data: linechartData
  };

  // Create the chart
  var lineChart = new Chart(lineChartctx, lineChartconfig);

<?php } ?>
</script>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.iframemaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/logjanec/public_html/customair/resources/views/iframe_map_filter.blade.php ENDPATH**/ ?>