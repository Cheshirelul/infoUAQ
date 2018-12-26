
<?php
$para      = 'edmenre58@gmail.com';
$titulo    = 'Se modifico una notificación';
$mensaje   = 'Hola, se modifico una notificación. Revisa la aplicación. La notificacion modificada es: '.$nombre;
$cabeceras = 'From: NOTIFICAUAQ' . "\r\n" .
    'Reply-To: notificauaq@hopto.org' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
?>
