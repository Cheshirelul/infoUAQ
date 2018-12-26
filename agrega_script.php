<?php
$tipo = $_POST["tipo"];
$nombre = $_POST["nombre"];
$carrera = $_POST["carrera"];
$fecha = $_POST["fecha"];
$descripcion = $_POST["descripcion"];
$user = $_SESSION['s_usuario'];

if($tipo==1){
	$nom_tabla="notificacion_global";
}else{
	$nom_tabla="notificacion_especifica";
}
if ($config = $mysqli->query('SELECT nombre FROM '.$nom_tabla.' WHERE nombre="'.$nombre.'"')) {

	$fila = $config->fetch_assoc();

	if($fila['nombre']!=NULL){
		echo '<div class="warning animated bounceInUp shida">';
		echo 'Esta notificación ya fue creada';
		echo '</div>';
	}else{

		if($tipo==1){

			$mysqli->query('INSERT INTO notificacion_global (nombre, fecha, descripcion) VALUES ("'.$nombre.'", "'.$fecha.'", "'.$descripcion.'")');
			$fila = $config->fetch_assoc();
			echo '<div class="success animated bounceInUp shida">';
			echo 'Notificación creada';
			echo '</div>';
		}else{

			$mysqli->query('INSERT INTO notificacion_especifica (nombre, fecha, descripcion, carrera) VALUES ("'.$nombre.'", "'.$fecha.'", "'.$descripcion.'", "'.$carrera.'")');
			$fila = $config->fetch_assoc();
			echo '<div class="animated bounceInDown shida">';
			echo 'Notificación creada';
			echo '</div>';
		}

	}

}

}

}else{
	echo '<div class="error animated bounceInUp shida">';
	echo 'Ocurrio un error al verificar los usuarios';
	echo '</div>';
}


?>