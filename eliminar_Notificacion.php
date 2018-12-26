<?php
session_start();

if($_GET){
	include("mysql.php");
	//variables recibidas
	$idNotificacion= $_GET["id_notificacion"];
	$tipoNotificacion = $_SESSION["s_tipo"];
	echo "esta es la ID: ".$idNotificacion."<br>";
	echo "este es el tipo: ".$tipoNotificacion;
	//inicio de transaccion
	$mysqli->begin_transaction();
	$exito = false;
	if($tipoNotificacion==1){//borra notificacion global
		$pst = $mysqli->prepare("DELETE FROM notificacion_global WHERE id_notificacion = ?");
		$pst->bind_param('i',$idNotificacion);
		$pst->execute();
		$exito=true;
	}else{//borra notifcacion especifica
		echo 'Notificacion especifica';
		$pst = $mysqli->prepare("DELETE FROM notificacion_especifica WHERE id_notificacion = ?");
		$pst->bind_param('i',$idNotificacion);
		$pst->execute();
		$exito=true;
	}
//	$pst->execute();
//	$exito=true;
	if($exito)
	{
		$mysqli->commit();
		header("Location:notifica.php");
	}else{
		$mysqli->rollback();
		echo "La notificacion no pudo ser eliminada";
		//echo javascript:window.history.back();
	}
}else{
	echo "Algo salio mal al eliminar, posibles campos vacios";
}
?>