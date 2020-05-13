<?php
require '../vendor/autoload.php';
require 'conexion_bd.php';

use Twilio\Rest\Client;

$sid = 'ACc85a8a7ca720a26c0d94ad2acf9e0100';
$token = 'dc31ed7b6d3a1750aff31dc9d2f3da86';
$client = new Client($sid, $token);

$sql_nombre_archivo = "select nombre_archivo from datos 
group by nombre_archivo
order by nombre_archivo desc
limit 1";
$result_nombre_archivo = $conn->query($sql_nombre_archivo) or die($conn->error);
$row_nombre_archivo = $result_nombre_archivo->fetch_assoc();
$archivo_nombre = (string) $row_nombre_archivo['nombre_archivo'];

$sql_datos ="select * from datos 
join puntos_monitoreo 
where punto_id = puntos_monitoreo.id 
and nombre_archivo = '$archivo_nombre'";
$num_elev = '';

$result_datos = $conn->query($sql_datos) or die($conn->error);
while ($row = $result_datos->fetch_assoc()) {
    $float = (float) $row['pm10'];
    if($float > 26){
        $num_elev = $row;
        $valor = (float) $num_elev['pm10'];
        $fecha = (string) $row['fecha_hora'];
        $punto = (string) $row['punto_id'];
    }
}
if($num_elev != ''){
    $sql_nombre_punto = "select alias from puntos_monitoreo where id = '$punto'";
    $result_nombre_punto = $conn->query($sql_nombre_punto) or die($conn->error);
    $row_nombre_punto = $result_nombre_punto->fetch_assoc();
    $nombre_punto = (string) $row_nombre_punto['alias'];
    var_dump($nombre_punto);  
    $client->messages->create(
        '+573128693442',
        [ 
            'from' => '+16692013141',
            'body' => 'Se ha registrado una medida de '.$valor.'µg/m3, la cual se encuentra fuera de los rangos en el punto de monitoreo '.$nombre_punto.' con fecha y hora '.$fecha.''
        ]
    );
}



