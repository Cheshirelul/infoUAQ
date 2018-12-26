
<?php
		  //include("mysql.php");
session_start();
$user = $_SESSION['s_usuario'];
?>
<!DOCTYPE html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>CSS3 Responsive Menu</title>
        <link href="style/reset.css" rel="stylesheet" type="text/css" />
        <link href="style/example.css" rel="stylesheet" type="text/css" />
		<link href="style/formulario.css" rel="stylesheet" type="text/css" />
		<link href="style/tabla.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
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
        <script src="style/script/respond.js"></script>
        <!--[if lte IE 8]>
        <script src="style/script/html5.js"></script>
        <![endif]-->
        <script src="script/jquery.js"></script>
       
    </head>

    <body style="background-color:#EFEFEF;">
    <form action="notificaciones.php" method="POST" enctype="multipart/form-data">
        <div id="banner-wrapper">
            <header id="banner" role="banner">
                <div id="banner-inner-wrapper">
                    <div id="banner-inner">
                        <hgroup id="title">
                            <img id="logo" src="image/logo.png" title="Responsive Bar" />
                        </hgroup>
                        <nav id="menu-nav">
                            <div id="menu-button">
                                <div id="menu-button-inner"></div>
                            </div>
                        </nav>
                    </div>
                </div>
                <nav id="menu-drink">
                    <ul>
                        <li>
                            <a class="beer" href="perfil.php"><span class="icon"></span>Mi Perfil</a>
                        </li>
                        <li>
                            <a class="wine" href="notificaciones.php"><span class="icon"></span>Notificaciones</a>
                        </li>
                        <li>
                            <a class="soft-drink" href="agregarnotificacion.php">Agregar Notificación<span class="icon"></span></a>
                        </li>
                        <li>
                            <a class="coffee-tea" href="destroy.php"><span class="icon"></span>Salir</a>
                        </li>
                    </ul>
                </nav>
            </header>
        </div>
		
		<div id="main-container">
		<div class="form__top">
			<h2>Notificaciones<span class="form__reg">
			  <select class="input_tipo" name="tipo" required autofocus>
			    <option selected value="1">General</option>
			    <option value="2">Específica</option>
		    </select>
			</span></h2>
			<p><input type="submit" class="btn__submit" value="CAMBIAR">&nbsp;</p>
		</div>	
        
		
	  <?php
error_reporting(0);
?>		

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
						<table>
							<tbody>
                    


<?php


//$dbconnect=mysqli_connect("localhost","ITSJR_NOTIFICATEC","12345678lol","itsjr_notificatec");

//if ($dbconnect->connect_error) {
  //die("Database connection failed: " . $dbconnect->connect_error);
//}
include("mysql.php");

$tipo = $_POST["tipo"];

$_SESSION['s_tipo'] = $tipo;
if($tipo==1){
$query = mysqli_query($dbconnect, "SELECT nombre,descripcion,fecha,id_notificacion FROM notificacion_global")
   or die (mysqli_error($dbconnect));
}else{
$mysqli = new mysqli("localhost", "ITSJR_NOTIFICATEC", "12345678lol", "itsjr_notificatec");

$resultado = $mysqli->query('SELECT carrera FROM usuario WHERE usuario = "'.$user.'"');
$fila = $resultado->fetch_assoc();




$query = mysqli_query($dbconnect, 'SELECT nombre,descripcion,fecha FROM notificacion_especifica WHERE carrera="'.$fila['carrera'].'"')
   or die (mysqli_error($dbconnect));


}//FIN DE IF TIPO


while ($row = mysqli_fetch_array($query)) {
	
								echo '<tr class="row100 body">';
									echo '<td>'.$row['nombre'].'</td>';
									echo '<td>'.$row['descripcion'].'</td>';
									echo '<td>'.$row['fecha'].'</td>';
									
								echo '</tr>';

 // echo '<tr>';
   // echo '<td>'.$row['nombre'].'</td>';
    //echo '<td>'.$row['descripcion'].'</td>';
    //echo '<td>'.$row['fecha'].'</td>';
	}
   //echo '</tr>\n';


?>
		
	</tbody>
						</table>
					</div>
				</div>
				
				

</div>
</div>
</div>
	
        <footer id="contentinfo" role="contentinfo"></footer>
        </form>
    </body>
</html>
