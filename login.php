<?php
include("mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>NOTIFICAUAQ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="index.php" method="POST">
					<span class="login100-form-title">
						Inicar sesión
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="usuario" placeholder="Correo electronico">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Se necesita introducir una contraseña">
						<input class="input100" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						
						
					</div>
<?php

error_reporting(0);
$usuario = $_POST["usuario"];
$pass = $_POST["pass"];
$a="";

if($usuario != $a and $pass != $a){	


session_start();


if($pass==NULL){
		echo '<br>';
	echo 'Debes de introducir tu contraseña';
}else
	

$resultado = $mysqli->query('SELECT usuario, pass FROM usuario WHERE usuario = "'.$usuario.'"');
$fila = $resultado->fetch_assoc();


if($fila['usuario'] == $usuario and $fila['pass'] == md5($pass)) {
	
$resultado = $mysqli->query('SELECT usuario FROM usuario WHERE usuario = "'.$usuario.'"');
$fila = $resultado->fetch_assoc();
$_SESSION['s_usuario'] = $fila['usuario'];
$id = $_GET['id'];
$cadena = $_GET['cadena'];

mysqli_close($connect);
	echo '<br>';

	
		header('location: agregarnotificacion.php'); 

}else{
	echo '<br>';
echo '<div class="animated bounceInDown"><font color="#EE0000">Usuario o Contraseña incorrectos</font>';

}

}else{
}

?>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>