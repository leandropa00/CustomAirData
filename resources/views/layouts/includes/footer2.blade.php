<div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="#" target="_blank"></a>All rights Reserved</span><!--<span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>-->
          
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{url('/')}}/includes/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{url('/')}}/includes/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="{{url('/')}}/includes/app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{url('/')}}/includes/app-assets/js/core/app-menu.js"></script>
    <script src="{{url('/')}}/includes/app-assets/js/core/app.js"></script>
    <script src="{{url('/')}}/includes/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{url('/')}}/includes/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- END: Page JS-->
<script src="{{url('/')}}/includes/app-assets/vendors/js/charts/chart.min.js"></script>
</body>
<!-- END: Body-->


 <?php
$date=date("Y-m-d H:i:s", strtotime('-12 hours', time()));
use App\Upload_data;
    $upload_data =  DB::select( DB::raw("SELECT max(pm10) as pm10 , max(pm25) as pm25 , max(tsp) as tsp,max(no) as no,max(so2) as so2,max(no2) as no2,max(nox) as nox,max(dv) as dv FROM `upload_datas`  group by date order by date desc limit 7
") );

       $arr = array();
       $arr1 = array();
       $arr2 = array();
       $arr3 = array();
       $arr4 = array();
       $arr5 = array();
       $arr6 = array();
       $arr7 = array();

       foreach($upload_data as $data){
          

          $arr['date'][] ='';
          $arr1['date'][] ='';
          $arr2['date'][] ='';
          $arr3['date'][] ='';
          $arr4['date'][] ='';
          $arr5['date'][] ='';
          $arr6['date'][] ='';
          $arr7['date'][] ='';

            $arr['pm10'][] =floatval($data->pm10);
            $arr1['pm25'][] =floatval($data->pm25);
            $arr2['tsp'][] =floatval($data->tsp);
            $arr3['no'][] =floatval($data->no);
            $arr4['so2'][] =floatval($data->so2);
            $arr5['no2'][] =floatval($data->no2);
            $arr6['nox'][] =floatval($data->nox);
            $arr7['dv'][] =floatval($data->dv);
         }
      $arr_json=json_encode($arr);
      $arr_json1=json_encode($arr1);
      $arr_json2=json_encode($arr2);
      $arr_json3=json_encode($arr3);
      $arr_json4=json_encode($arr4);
      $arr_json5=json_encode($arr5);
      $arr_json6=json_encode($arr6);
      $arr_json7=json_encode($arr7);




?>

<script>
 
<?php
if(isset($arr_json)) 

{ 

$arr_json = json_decode($arr_json,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx = $("#line-chart");

  // Chart Options
  var linechartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 01 | 2019-12-24_2019-12-24'
    }
  };

  // Chart Data
  var linechartData = {
   // labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
    labels: <?php if(isset($arr_json["date"])) { echo json_encode($arr_json["date"]); }?>,

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
      borderColor: "#f76e0f",
       backgroundColor:"#f76e0f",
        pointRadius:"0",
      fill: true
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






<script>
 
<?php
if(isset($arr_json1)) 

{ 

$arr_json1 = json_decode($arr_json1,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx1 = $("#line-chart1");

  // Chart Options
  var linechartOptions1 = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 01 | 2019-12-24_2019-12-24'
    }
  };

  // Chart Data
  var linechartData1 = {
   // labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
    labels: <?php if(isset($arr_json1["date"])) { echo json_encode($arr_json1["date"]); }?>,
    datasets: [


<?php

$i=0;

 $max_field1=count($arr_json1);

foreach($arr_json1 as $k=>$v)
{
    $i++;
    if($i==1) continue;

    print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "#28C76F",
       backgroundColor:"#28C76F",
      fill: true
    }');

    if($i!=$max_field1) echo ",";
}


?>]
  };

  var lineChartconfig1 = {
    type: 'line',

    // Chart Options
    options: linechartOptions1,

    data: linechartData1
  };

  // Create the chart
  var lineChart1 = new Chart(lineChartctx1, lineChartconfig1);

<?php } ?>
</script>



<script>
 
<?php
if(isset($arr_json2)) 

{ 

$arr_json2 = json_decode($arr_json2,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx2 = $("#line-chart2");

  // Chart Options
  var linechartOptions2 = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 02 | 2029-22-24_2029-22-24'
    }
  };

  // Chart Data
  var linechartData2 = {
  
    labels: <?php if(isset($arr_json2["date"])) { echo json_encode($arr_json2["date"]); }?>,
    datasets: [


<?php

$i=0;

 $max_field2=count($arr_json2);

foreach($arr_json2 as $k=>$v)
{
    $i++;
    if($i==1) continue;

    print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "#EA5455",
       backgroundColor:"#EA5455",
      fill: true
    }');

    if($i!=$max_field2) echo ",";
}


?>]
  };

  var lineChartconfig2 = {
    type: 'line',

    // Chart Options
    options: linechartOptions2,

    data: linechartData2
  };

  // Create the chart
  var lineChart2 = new Chart(lineChartctx2, lineChartconfig2);

<?php } ?>
</script>


<script>
 
<?php
if(isset($arr_json3)) 

{ 

$arr_json3 = json_decode($arr_json3,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx3 = $("#line-chart3");

  // Chart Options
  var linechartOptions3 = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 03 | 2039-32-24_2039-32-24'
    }
  };

  // Chart Data
  var linechartData3 = {
  
    labels: <?php if(isset($arr_json3["date"])) { echo json_encode($arr_json3["date"]); }?>,
    datasets: [


<?php

$i=0;

 $max_field3=count($arr_json3);

foreach($arr_json3 as $k=>$v)
{
    $i++;
    if($i==1) continue;

    print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "#FF9F43",
       backgroundColor:"#FF9F43",
      fill: true
    }');

    if($i!=$max_field3) echo ",";
}


?>]
  };

  var lineChartconfig3 = {
    type: 'line',

    // Chart Options
    options: linechartOptions3,

    data: linechartData3
  };

  // Create the chart
  var lineChart3 = new Chart(lineChartctx3, lineChartconfig3);

<?php } ?>
</script>



<script>
 
<?php
if(isset($arr_json4)) 

{ 

$arr_json4 = json_decode($arr_json4,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx4 = $("#line-chart4");

  // Chart Options
  var linechartOptions4 = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 04 | 2049-42-24_2049-42-24'
    }
  };

  // Chart Data
  var linechartData4 = {
  
    labels: <?php if(isset($arr_json4["date"])) { echo json_encode($arr_json4["date"]); }?>,
    datasets: [


<?php

$i=0;

 $max_field4=count($arr_json4);

foreach($arr_json4 as $k=>$v)
{
    $i++;
    if($i==1) continue;

    print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "#fbdc7f",
       backgroundColor:"#fbdc7f",
      fill: true
    }');

    if($i!=$max_field4) echo ",";
}


?>]
  };

  var lineChartconfig4 = {
    type: 'line',

    // Chart Options
    options: linechartOptions4,

    data: linechartData4
  };

  // Create the chart
  var lineChart4 = new Chart(lineChartctx4, lineChartconfig4);

<?php } ?>
</script>


<script>
 
<?php
if(isset($arr_json5)) 

{ 

$arr_json5 = json_decode($arr_json5,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx5 = $("#line-chart5");

  // Chart Options
  var linechartOptions5 = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 05 | 2059-52-24_2059-52-24'
    }
  };

  // Chart Data
  var linechartData5 = {
  
    labels: <?php if(isset($arr_json5["date"])) { echo json_encode($arr_json5["date"]); }?>,
    datasets: [


<?php

$i=0;

 $max_field5=count($arr_json5);

foreach($arr_json5 as $k=>$v)
{
    $i++;
    if($i==1) continue;

    print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "#dae1e7",
       backgroundColor:"#dae1e7",
      fill: true
    }');

    if($i!=$max_field5) echo ",";
}


?>]
  };

  var lineChartconfig5 = {
    type: 'line',

    // Chart Options
    options: linechartOptions5,

    data: linechartData5
  };

  // Create the chart
  var lineChart5 = new Chart(lineChartctx5, lineChartconfig5);

<?php } ?>
</script>


<script>
 
<?php
if(isset($arr_json6)) 

{ 

$arr_json6 = json_decode($arr_json6,true);
  
?>


  var grid_line_color = 'transparent';


  // Line Chart
  // ------------------------------------------

  //Get the context of the Chart canvas element we want to select
  var lineChartctx6 = $("#line-chart6");

  // Chart Options
  var linechartOptions6 = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      position: 'left',
      display:false
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
      display: false,
      text: 'Chemilab 06 | 2069-62-24_2069-62-24'
    }
  };

  // Chart Data
  var linechartData6 = {
   // labels: [6500, 6600, 6700, 6750, 6800, 6850, 6900, 6950, 6999, 2050],
    labels: <?php if(isset($arr_json6["date"])) { echo json_encode($arr_json6["date"]); }?>,
    datasets: [


<?php

$i=0;

 $max_field6=count($arr_json6);

foreach($arr_json6 as $k=>$v)
{
    $i++;
    if($i==1) continue;

    print('{
      label: "'.strtoupper($k).'",
      data: '.json_encode($v).',
      borderColor: "#f10606",
      backgroundColor:"#f10606",
      fill: true
    }');

    if($i!=$max_field6) echo ",";
}


?>]
  };

  var lineChartconfig6 = {
    type: 'line',

    // Chart Options
    options: linechartOptions6,

    data: linechartData6
  };

  // Create the chart
  var lineChart6 = new Chart(lineChartctx6, lineChartconfig6);

<?php } ?>
</script>



<!-- END: Body-->
<script>
    
function show_menu()
{
 $(".li_hide").removeClass('li_none');   
$(".my_menu").removeClass('li_none');
$(".li_show").addClass('li_none');
}

function hide_menu()
{
    
 $(".li_hide").addClass('li_none');   
$(".my_menu").addClass('li_none');
$(".li_show").removeClass('li_none');
}


</script>
</html>