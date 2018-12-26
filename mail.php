
<?php
$para      = 'edmenre58@gmail.com';
$titulo    = 'Nueva notificación';
$mensaje   = 'Hola, se creo una nueva notificación especial para ti. Revisa la aplicación. Detalles de la notificacion. Nombre: '.$nombre.' Descripción: '.$descripcion.' con fecha de: '.$fecha;
$cabeceras = 'From: NOTIFICAUAQ' . "\r\n" .
    'Reply-To: notificauaq@hopto.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
?>
