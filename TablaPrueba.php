<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Nombre</th>
									<th class="cell100 column2">Descripción</th>
									<th class="cell100 column3">Fecha</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">

						<?php
						error_reporting(0);
						include("mysql.php");

						$tipo = $_POST["tipo"];

						$_SESSION['s_tipo'] = $tipo;
						if($tipo==1){
						$query = mysqli_query($mysqli, "SELECT nombre,descripcion,fecha,id_notificacion FROM notificacion_global")
							 or die (mysqli_error($mysqli));
						}else{
						//$mysqli = new mysqli("localhost", "ITSJR_NOTIFICATE", "12345678lol", "itsjr_notificatec");

						$resultado = $mysqli->query('SELECT carrera FROM usuario WHERE usuario = "'.$user.'"');
						$fila = $resultado->fetch_assoc();




						$query = mysqli_query($mysqli, 'SELECT nombre,descripcion,fecha FROM notificacion_especifica WHERE carrera="'.$fila['carrera'].'"')
							 or die (mysqli_error($mysqli));


						}//FIN DE IF TIPO
						?>

						<table>
							<?php
							while ($row = mysqli_fetch_array($query)) {
							?>
							<tbody>
									<tr class="row100 body">
										<td class="cell100 column1"><?php echo $row['nombre']; ?></td>
										<td class="cell100 column2"><?php echo $row['descripcion']; ?></td>
										<td class="cell100 column3"><?php echo $row['fecha']; ?></td>
									</tr>
						<?php }
						?>
						</table>
					</div>
				</div>

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
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});


	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
