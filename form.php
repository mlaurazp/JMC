<?php

$nombre= $_POST['name'];
$email= $_POST['email'];
$telefono= $_POST['telefono'];
$mensaje= $_POST['mensaje'];



$header .="Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje .= "Su telefono es: " . $telefono . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$destinatario = 'jmmc.esp@gmail.com';
$asunto = 'Contacto desde mi web';
mail($destinatario, $asunto, utf8_decode($mensaje), $header);

header('Location: pages/exitoForm.html');

?>


