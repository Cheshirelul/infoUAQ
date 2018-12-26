<?php
error_reporting(0);
session_start();
include("mysql.php");
include("prueba.php");
//no stoy seguro de que se hace aqui :v
$tipo = $_SESSION["s_tipo"];
//echo "1 significa global, 2 especifica. Este es el tipo: ".$tipo;
$id_notificacion =mysqli_escape_string($mysqli, $_GET["id_notificacion"]);
if ($tipo==1) {
    $datosNotificacion = $mysqli->query("SELECT * FROM notificacion_global WHERE id_notificacion = {$id_notificacion}");
} else {
    $datosNotificacion = $mysqli->query("SELECT * FROM notificacion_especifica WHERE id_notificacion = {$id_notificacion}");
}

$datos = $datosNotificacion->fetch_array();
?>

<div class="animated bounceInDown loginForm">
	<hgroup>
		<h1>Modificar Notificación</h1>
	</hgroup>
	<form action="actualizarNotificacion.php" method="POST" class="animated bounceInDown" enctype="multipart/form-data">
		<div class="group">
		<input type="text" id="Id" name="Id" value="<?php echo $datos['id_notificacion'];?>">
		<input type="hidden" name="tipoOriginal" value="<?php echo $tipo; ?>" />
			<div style="color: black;">
				Tipo de notitficacion
			</div>
			<br>
			<select name="tipo" required autofocus>
				<option selected value="1">General</option>
				<option value="2">Específica</option>
			</select>
		</div>
		<div class="group">
			<div style="color: black;">
				Nombre
			</div>
			<input type="text" name="nombre" required pattern="[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+" value="<?php 
            $REM = array('"','\'');
            $RAM = array('&#34','&#39');
            echo str_replace($REM,$RAM,$datos['nombre']);?>"><span class="highlight" placeholder="Nombre"></span><span class="bar"></span>
		</div>
		<div class="group">
			<div style="color: black;">
				Fecha
			</div>
			<input type="date" name="fecha" value="<?php echo $datos['fecha'];?>"><span class="highlight" required></span><span class="bar"></span>
		</div>
		<div class="group">

			<SELECT NAME="carrera">
				<option>Seleccionar carrera</option>

				<OPTION VALUE="1">ISC</OPTION>
				<OPTION VALUE="2">TICS</OPTION>
				<OPTION VALUE="3">INDUSTRIAL</OPTION>
				<OPTION VALUE="4">ELECTRONICA</OPTION>
				<OPTION VALUE="5">IGE</OPTION>

			</SELECT><span class="highlight" required></span><span class="bar"></span>
		</div>

		<div class="group">
			<textarea cols="35" rows="7" name="descripcion" placeholder="Descripcion"><?php echo $datos['descripcion'];?></textarea>

		</div>

		<button type="submit" name="submit" class="buttonui"> <span> Actualizar </span>
			<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
		</button>  

		<button type="reset" class="buttonui"> <span> Limpiar </span>
			<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
		</button>  
	</form>
	<br>
	<br>
	<div class="powered">
		NOTIFICAUAQ V1.0
	</div>
</div>

<?php
include("pfin.php");
?>
</body>
</html>
