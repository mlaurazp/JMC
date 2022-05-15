<?php

/*$nombre= $_POST['name'];
$email= $_POST['email'];
$telefono= $_POST['telefono'];
$mensaje= $_POST['mensaje'];



$header .="Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
$mensaje .= "Su e-mail es: " . $email . " \r\n";
$mensaje .= "Su telefono es: " . $telefono . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$destinatario = 'mlaurzp@gmail.com';
$asunto = 'Contacto desde mi web';
mail($destinatario, $asunto, utf8_decode($mensaje), $header);*/

header('Location:pages/exitoForm.html');

if ($_POST['g-recaptcha-response'] == '') {
    echo "Captcha invalido";
    } else {
    $obj = new stdClass();
    $obj->secret = "6LcUt-8fAAAAAGsLbyC0fBHN6oVDxXEdcwCJQDY1";
    $obj->response = $_POST['g-recaptcha-response'];
    $obj->remoteip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    
    $options = array(
    'http' => array(
    'header' => "Location:pages/exitoForm.html",
    'method' => 'POST',
    'content' => http_build_query($obj)
    )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    
    $validar = json_decode($result);
    
    /* FIN DE CAPTCHA */
    
    if ($validar->success) {
    $email = trim($_POST['email']);
    $nombre = trim($_POST['name']);
    $telefono = trim($_POST['telefono']);
    $mensaje = trim($_POST['mensaje']);
    
    $consulta = "E-mail: " . $email . " Nombre: " . $nombre . " Telefono: " . $telefono . "Mensaje: " . $mensaje;
    
    mail("mlaurazp@gmail.com", "Contacto desde Formulario", $consulta);
    } else {
    echo "Captcha invalido";
    }
    
    ?>


