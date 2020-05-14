<?php 
    $conn = new mysqli("localhost", "logjanec_airlab", "baG[sy0AkK7r", "logjanec_airlab");

    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);
?>