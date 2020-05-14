<?php

date_default_timezone_set('America/Bogota');
require 'conexion_bd.php';

$sql = "select * from puntos_monitoreo where deleted_at is null";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  
  $loc_id = $row['id'];
  $dir = $row['ruta'];
  $location_name = $row['alias'];

  if (!is_dir($dir)) {
    $msg = "<h2>Hola admin,</h2><hr><p>Ruta no existente para <b>" . $row['alias'] . "</b></p><br></br><p><b>Thanks,</b><br> Airlab.com</p>";
    send_mail($msg);
    echo 'Error, ruta no existente';

  } else {
    $files = array_filter(scandir($dir), function($file) { 
      return pathinfo($file, PATHINFO_EXTENSION) == 'dat';
    }); 
    
    if (empty($files)) {
      $msg = "<h2>Hola admin,</h2><hr><p> No hay datos para el punto <b>" . $row['alias'] . "</b> en la ruta " . $row['ruta'] . "</p><br></br><p><b>Gracias,</b><br> Airlab.com</p>";
      send_mail($msg);
      echo 'Error, no hay datos en la ruta '.$row['ruta'];

    } else {
      $today = date('Ymd').'.dat';
    
      if (in_array($today, $files)) {
        $file_name = $today;
        $file_date = explode('.', $file_name);
        $file_date = $file_date[0];
    
        delete_record($conn, $file_date, $loc_id);
        insert_record($conn, $dir, $file_name, $file_date, $loc_id, $location_name);
    
      } else {
        $msg = "<h2>Hola admin,</h2><hr><p>No hay datos del día de hoy para el punto <b>" . $row['alias'] . "</b> en la ruta " . $row['ruta'] . "</p><br></br><p><b>Gracias,</b><br> Airlab.com</p>";
        send_mail($msg);
        echo 'Error, no hay datos del día de hoy para el punto '. $row['alias'] .' en la ruta '. $row['ruta'];
      }
    }
  }

  // Alertas tempranas
  $sql1 = "SELECT * from puntos_monitoreo
    inner join campanas on campanas.id = puntos_monitoreo.campana_id
    inner join empresas on empresas.id = campanas.empresa_id
    where puntos_monitoreo.id = $loc_id";

  $result1 = $conn->query($sql1);
  $row1 = mysqli_fetch_assoc($result1);
  $telefono = '+57'.$row1['telefono'];

  $dateTime = new DateTime();
  $dateTime->modify('-10 minute');
  $dateToCompare = $dateTime->format('Y-m-d H:i:s');

  $sql2 = "SELECT * from datos 
    where punto_id = $loc_id 
    and fecha_hora > '$dateToCompare'";
  $result2 = $conn->query($sql2);
  $row2 = mysqli_fetch_assoc($result2);

  if (!is_null($row2)) {
    $sql3 = "SELECT * from contaminantes_puntos 
    inner join contaminantes on contaminantes.id = contaminantes_puntos.contaminante_id
    where punto_monitoreo_id = $loc_id";
    $result3 = $conn->query($sql3);

    while ($row3 = $result3->fetch_assoc()) {
      if (!is_null($row3['minimo'])) {
        if ($row2[$row3['nombre_campo']]*$row3['conversion'] < $row3['minimo']){
          include_once('twilio.php');
          $client->messages->create(
            $telefono,
            [ 
                'from' => '+16692013141',
                'body' => $row2['fecha_hora'].' - '.$row3['nombre']." del punto de monitoreo $location_name registró ".$row2[$row3['nombre_campo']]*$row3['conversion'].' '.$row3['unidad_final'].' el cual es menor a '.$row3['minimo'].' '.$row3['unidad_final']
            ]
          );
          echo $row2['fecha_hora'].' - '.$row3['nombre']." del punto de monitoreo $location_name registró ".$row2[$row3['nombre_campo']]*$row3['conversion'].' '.$row3['unidad_final'].' el cual es menor a '.$row3['minimo'].' '.$row3['unidad_final'];
        }
      }

      if (!is_null($row3['maximo'])) {
        if ($row2[$row3['nombre_campo']]*$row3['conversion'] > $row3['maximo']){
          include_once('twilio.php');

          $client->messages->create(
            $telefono,
            [ 
                'from' => '+16692013141',
                'body' => $row2['fecha_hora'].' - '.$row3['nombre']." del punto de monitoreo $location_name registró ".$row2[$row3['nombre_campo']]*$row3['conversion'].' '.$row3['unidad_final'].' el cual es mayor a '.$row3['maximo'].' '.$row3['unidad_final']
            ]
          );
          echo $row2['fecha_hora'].' - '.$row3['nombre']." del punto de monitoreo $location_name registró ".$row2[$row3['nombre_campo']]*$row3['conversion'].' '.$row3['unidad_final'].' el cual es mayor a '.$row3['maximo'].' '.$row3['unidad_final'];
        }
      }
    }
  } else {
    $msg = "<h2>Hola admin,</h2><hr><p>No hay datos para el día de hoy después de las ".$dateTime->format('g:i A')." para el punto <b>" . $row['alias'] . "</b> en la ruta " . $row['ruta'] . "</p><br></br><p><b>Gracias,</b><br> Airlab.com</p>";
    send_mail($msg);
    echo 'No hay datos para hoy después de las '.$dateTime->format('g:i A');
  }
}

function delete_record($conn, $file_date, $loc_id)
{
  $sql_del = "delete from datos where nombre_archivo='" . $file_date . "' AND punto_id='" . $loc_id . "'";
  $query = mysqli_query($conn, $sql_del) or die(mysqli_error($conn));
}

function send_mail($msg)
{
  include_once('phpmailer/class.phpmailer.php');
  $mail = new PHPMailer();
  $mail->From = "info@logjane.com";
  $mail->FromName = "logjane.com";
  $mail->addaddress("goffice24@gmail.com");
  $mail->addbcc("leandropa00@gmail.com", '');
  $mail->Subject  = "Error en la carga de datos de airlab";
  $mail->AltBody  = "Para ver el mensaje, utiliza un HTML compatible!"; 
  $mail->MsgHTML($msg);

  if (!$mail->Send()) {
    return "Mailer Error: " . $mail->ErrorInfo;
  }
}

function insert_record($conn, $dir, $file_name, $file_date, $loc_id, $location_name)
{
  $dirv = $dir;
  $data = file_get_contents($dirv . $file_name);
  $data = utf8_encode($data);
  $newstring = preg_replace("/[\n\r]/", "----------", $data);
  $content_array = explode("----------", $newstring);
  $column_name = explode(";", $content_array[2]);
  $col_seq = array();

  for ($i = 0; $i < count($column_name); $i++) {
    if ($column_name[$i] != '') {
      $col_name = explode(",", $column_name[$i]);
      if (isset($col_name[1]))
        $col_seq[] = $col_name[1];
      else
        $col_seq[] = 'HHMM';
    }
  }

  $pm10 = array_search('PM10', $col_seq);
  if ($pm10 == '') $pm10 = '99';
  $pm25 = array_search('PM25', $col_seq);
  if ($pm25 == '') $pm25 = '99';
  $so2 = array_search('SO2', $col_seq);
  if ($so2 == '') $so2 = '99';
  $o3 = array_search('O3', $col_seq);
  if ($o3 == '') $o3 = '99';
  $co = array_search('CO', $col_seq);
  if ($co == '') $co = '99';
  $no = array_search('NO', $col_seq);
  if ($no == '') $no = '99';
  $no2 = array_search('NO2', $col_seq);
  if ($no2 == '') $no2 = '99';
  $nox = array_search('NOx', $col_seq);
  if ($nox == '') $nox = '99';
  $dv = array_search('DV', $col_seq);
  if ($dv == '') $dv = '99';
  $vv = array_search('VV', $col_seq);
  if ($vv == '') $vv = '99';
  $hr = array_search('HR', $col_seq);
  if ($hr == '') $hr = '99';
  $temp = array_search('TEMP', $col_seq);
  if ($temp == '') $temp = '99';
  $pb = array_search('PB', $col_seq);
  if ($pb == '') $pb = '99';
  $rs = array_search('RS', $col_seq);
  if ($rs == '') $rs = '99';
  $rain = array_search('RAIN', $col_seq);
  if ($rain == '') $rain = '99';
  $humedad = array_search('Humedad Int', $col_seq);
  if ($humedad == '') $humedad = '99';
  $temp2 = array_search('Temperatura Int', $col_seq);
  if ($temp2 == '') $temp2 = '99';
  $vel_aspiracion = array_search('Vel Aspiracion', $col_seq);
  if ($vel_aspiracion == '') $vel_aspiracion = '99';
  $tsp = array_search('TSP', $col_seq);
  if ($tsp == '') $tsp = '99';
  $estado_puerta = array_search('Estado Puerta', $col_seq);
  if ($estado_puerta == '') $estado_puerta = '99';

  for ($i = 3; $i < count($content_array); $i++) {
    if ($content_array[$i] != '') {
      $content_array[$i] = preg_replace('/\s+/', ' ', $content_array[$i]);
      $column_name = explode(" ", $content_array[$i]);
      $column_name[99] = '';
      $file_date = explode('.', $file_name);
      $file_date1 = str_replace(' ', '', $file_date[0]);
      $column_name[0] = str_replace(' ', '', $column_name[0]);
      $column_name[0] = preg_replace('/\s+/', '', $column_name[0]);
      $newtime = chunk_split($column_name[0], 2, ':');
      $newdate = date('Y-m-d', strtotime($file_date1));
      $newtime = $newtime . '00';
      $datetime = $newdate . ' ' . $newtime;
      // print_r($column_name);
      $sql = "insert into datos set 
        punto_id='" . $loc_id . "',
        fecha_hora='" . $datetime . "',
        nombre_archivo='" . $file_date1 . "',
        pm10='" . $column_name[$pm10] . "',
        pm25='" . $column_name[$pm25] . "',
        tsp='" . $column_name[$tsp] . "',     
        so2='" . $column_name[$so2] . "',
        no='" . $column_name[$no] . "',
        no2='" . $column_name[$no2] . "',
        nox='" . $column_name[$nox] . "',
        dv='" . $column_name[$dv] . "',
        vv='" . $column_name[$vv] . "',
        hr='" . $column_name[$hr] . "',
        temp='" . $column_name[$temp] . "',
        pb='" . $column_name[$pb] . "',
        rs='" . $column_name[$rs] . "',
        rain='" . $column_name[$rain] . "',
        humedad='" . $column_name[$humedad] . "',
        temp2='" . $column_name[$temp2] . "',
        o3='" . $column_name[$o3] . "',
        co='" . $column_name[$co] . "',
        vel_aspiracion='" . $column_name[$vel_aspiracion] . "',
        estado_puerta='" . $column_name[$estado_puerta] . "'";

      $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
  }
}
