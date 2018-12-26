<?php
error_reporting(0);
?>
<!DOCTYPE html>
<!--[if lte IE 7 ]><html lang="en" class="ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if (gt IE 8)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>Notificaciones admin</title>
        <link href="style/reset.css" rel="stylesheet" type="text/css" />
        <link href="style/example.css" rel="stylesheet" type="text/css" />
		<link href="style/formulario.css" rel="stylesheet" type="text/css" />
		<link href="style/tabla.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width" />
        <script src="style/script/respond.js"></script>
        <!--[if lte IE 8]>
        <script src="style/script/html5.js"></script>
        <![endif]-->
        <script src="script/jquery.js"></script>
        <script>
            jQuery(function($) {
                var open = false;

                function resizeMenu() {
                    if ($(this).width() < 768) {
                        if (!open) {
                            $("#menu-drink").hide();
                        }
                        $("#menu-button").show();
                        $("#logo").attr("src", "image/logo.png");
                    }
                    else if ($(this).width() >= 768) {
                        if (!open) {
                            $("#menu-drink").show();
                        }
                        $("#menu-button").hide();
                        $("#logo").attr("src", "image/logo-large.png");
                    }
                }

                function setupMenuButton() {
                    $("#menu-button").click(function(e) {
                        e.preventDefault();

                        if (open) {
                            $("#menu-drink").fadeOut();
                            $("#menu-button").toggleClass("selected");
                        }
                        else {
                            $("#menu-drink").fadeIn();
                            $("#menu-button").toggleClass("selected");
                        }
                        open = !open;
                    });
                }


                $(window).resize(resizeMenu);

                resizeMenu();
                setupMenuButton();
            });
        </script>
    </head>
    <body style="background-color:#EFEFEF;">
    <form action="notificaciones_admin.php" method="POST" enctype="multipart/form-data">
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
                            <a class="beer" href="manda.html"><span class="icon"></span>Mi Perfil</a>
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
        <table>
		

<table border="1" align="center">
<tr>
    <td>Nombre</td>
    <td>Descripcion</td>
    <td>Fecha</td>
    <td>Opción</td>
    <td>Opción</td>
</tr>

<?php
include("mysql.php");
$tipo = $_POST["tipo"];
if($tipo==1){
    $notificacion_global = $mysqli->query("select * from notificacion_global");
    foreach($notificacion_global as $ng)
        {
            echo "<tr>
            <td>{$ng['nombre']}</td>
            <td>{$ng['descripcion']}</td>
            <td>{$ng['fecha']}</td>
            <td><a href='modificarnotificacion.php?id_notificacion={$ng['id_notificacion']}&tipo=$tipo'>Modificar</a></td>
            </tr>";
        }//fin foreach
}else{
    $notificacion_especifica = $mysqli->query("select * from notificacion_especifica");
    foreach($notificacion_especifica as $ne)
        {
            echo "<tr>
            <td>{$ne['nombre']}</td>
            <td>{$ne['descripcion']}</td>
            <td>{$ne['fecha']}</td>
            <td><a href='modificarnotificacion.php?id_notificacion={$ne['id_notificacion']}&tipo=$tipo'>Modificar</a></td>
            <td><a href='eliminar_Notificacion.php?id_notificacion={$ne['id_notificacion']}&tipo=$tipo'>Eliminar</a></td>
            </tr>";
        }//fin foreach
}
?>		
</thead>
</table>
<footer id="contentinfo" role="contentinfo"></footer>
</form>
</body>
</html>
