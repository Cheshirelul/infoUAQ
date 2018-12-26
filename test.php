<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
require_once ('Mobile_Detect.php');

$detect = new Mobile_Detect();
if ($detect->isMobile()) {

// Detecta si es un móvil
header ("Location: Prueba.html");
echo 'Dispositivo movil';
}else{
	header ("Location: main.php");
echo 'Computadora de escritorio';
}

if ($detect->isTablet()) {

// Si es un tablet
echo 'Es una tablet';
}

if ($detect->isAndroidOS()) {

// Si es Android
echo 'Dispositivo Android';
}

if ($detect->isiOS()){

 //Si es iOS
echo 'Dispositivo iOS';
}
?>
</body>
</html>