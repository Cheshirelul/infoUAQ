<?php
/*
mysqli(servidor, usuario, contraseña, base de datos);
*/
$servidor= "localhost";
$usuario= "c6pepepecas";
$psswd ="Qwerty12345678";
$bd = "c6notificauaq";

$mysqli = new mysqli($servidor, $usuario, $psswd,$bd);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}