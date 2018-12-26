<?php
session_start();
echo "entro";
if ($_POST)
{
	include("mysql.php");
	$id_notificacion = $_POST["Id"];
	//$id_notificacion = $_SESSION["s_idNot"];
	$nombre = $_POST["nombre"];
	$carrera = $_POST["carrera"];
	$fecha = $_POST["fecha"];
	$descripcion = $_POST["descripcion"];
	$tOriginal = $_POST["tipoOriginal"];
	$tipoNuevo = $_POST["tipo"];
	/* valores de tipos
	tipo = 1, significa que es Global
	tipo = 2, significa que es especifica
	*/

	echo "id: ".$id_notificacion."<br>" ;
	echo "nombre: ".$nombre."<br>" ;
	echo "carrera: ".$carrera."<br>" ;
	echo "fecha: ".$fecha."<br>" ;
	echo "desc: ".$descripcion."<br>" ;
	echo "tOriginal: ".$tOriginal."<br>" ;
	echo "tiponuevo: ".$tipoNuevo."<br>" ;
	if ($tOriginal == $tipoNuevo) {
		echo "se queda igual <br>";
		echo $descripcion;
		echo $carrera;
		if ($tipoNuevo== 1) {
			echo "se queda igual como notificacion global <br>";
			$mysqli->begin_transaction();
			$exito = false;
			$pst = $mysqli->prepare("UPDATE notificacion_global SET nombre = ?, descripcion = ?, fecha = ? WHERE id_notificacion = ?");
			$pst->bind_param('sssi',$nombre,$descripcion,$fecha,$id_notificacion);
			$pst->execute();
			$exito=true;
			if($exito)
				{
					$mysqli->commit();
					include("mail2.php");
					header("Location:notifica.php");
				}else{
					$mysqli->rollback();
					echo "La notificacion no pudo ser actualizada";
					echo "<a href='#' onlick=javascript:window.history.back()>Regresar</a>";
				}
		}else{
			echo "se queda igual como notificacion especifica <br>";
			$mysqli->begin_transaction();
			$exito = false;
			$pst = $mysqli->prepare("UPDATE notificacion_especifica SET nombre = ?, descripcion = ?, fecha = ?,carrera = ? WHERE id_notificacion = ?");
			$pst->bind_param('ssssi',$nombre,$descripcion,$fecha,$carrera,$id_notificacion);
			$pst->execute();
			$exito=true;
			if($exito)
				{
					$mysqli->commit();
					include("mail2.php");
					header("Location:notifica.php");
				}else{
					$mysqli->rollback();
					echo "La notificacion no pudo ser actualizada";
					echo "<a href='#' onlick=javascript:window.history.back()>Regresar</a>";
			}
		}//fin modificar cuando son del mismo tipo de notificacion alv prro me vale verga :v pto el que lo lea, esto es de frustracion :'v
	}else{
		echo "cambio El tipo de notificacion <br>";
		if ($tipoNuevo==1) {
			echo "cambio de de especifico a global";
			$mysqli->begin_transaction();
			$exito = false;

			$pst = $mysqli->prepare("INSERT INTO notificacion_global VALUES (null,?,?,?)");
			$pst->bind_param('sss',$nombre,$descripcion,$fecha);
			$pst->execute();			

			$pst = $mysqli->prepare("DELETE FROM notificacion_especifica WHERE id_notificacion =?");
			$pst->bind_param('i',$id_notificacion);
			$pst->execute();
			$exito = true;
			if($exito)
				{
					$mysqli->commit();
					include("mail2.php");
					header("Location:notifica.php");
				}else{
					$mysqli->rollback();
					echo "La notificacion no pudo ser actualizada";
					echo "<a href='#' onlick=javascript:window.history.back()>Regresar</a>";
			}
		} else {
			echo "cambio de global a especifico";
			$mysqli->begin_transaction();
			echo "inicio unicamente transaccion <br>";
			$exito = false;
			echo "Inicio transaccion <br>";
			$pst = $mysqli->prepare("INSERT INTO notificacion_especifica VALUES (null,?,?,?,?)");
			$pst->bind_param('ssss',$nombre,$descripcion,$fecha,$carrera);
			$pst->execute();			

			$pst = $mysqli->prepare("DELETE FROM notificacion_global WHERE id_notificacion =?");
			$pst->bind_param('i',$id_notificacion);
			echo "se va a ejecutar <br>";
			$pst->execute();
			$exito = true;
			echo "Paso el true <br>";
			if($exito)
				{
					$mysqli->commit();
					include("mail2.php");
					header("Location:notifica.php");
				}else{
					$mysqli->rollback();
					echo "La notificacion no pudo ser actualizada";
					echo "<a href='#' onlick=javascript:window.history.back()>Regresar</a>";
			}
		}
	}//fin if de tipo grandote alv :v that what she said
}else{
	echo "no se pudo";
}//fin if de post
?>