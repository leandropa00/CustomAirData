<?php
require '../vendor/autoload.php';
require 'conexion_bd.php';

use Twilio\Rest\Client;

$sid = 'ACc85a8a7ca720a26c0d94ad2acf9e0100';
$token = 'dc31ed7b6d3a1750aff31dc9d2f3da86';
$client = new Client($sid, $token);

$client->messages->create(
    '+573014161782',
    [ 
        'from' => '+16692013141',
        'body' => 'Se ha registrado una medida de 10 µg/m3, la cual se encuentra fuera de los rangos en el punto de monitoreo PRUEBA con fecha y hora HOY'
    ]
);




