		<?php
		error_reporting(0);
		session_start();
		include("mysql.php");
		include("prueba.php");

		?>
		<script language="javascript" type="text/javascript">
			$(document).ready(function(){
				$(".carrera").hide();
				$("#tipo").change(function(){
					$(".carrera").hide();
					$("#carrera").show();
				});
			});
		</script>
		<?php

		if(isset($_SESSION['s_usuario'])){

			if(($_POST['tipo']==NULL) | ($_POST['descripcion'])==NULL | ($_POST['fecha'])==NULL | ($_POST['carrera'])==NULL | ($_POST['descripcion'])==NULL){
				
				if(isset($_POST['submit'])==NUL){
					echo '<div class="error animated bounceInUp">';
					echo 'Por favor rellena todos los campos.';
					echo '</div>';
				}
			}else{

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
							include("mail.php");
						}else{

							$mysqli->query('INSERT INTO notificacion_especifica (nombre, fecha, descripcion, carrera) VALUES ("'.$nombre.'", "'.$fecha.'", "'.$descripcion.'", "'.$carrera.'")');
							$fila = $config->fetch_assoc();
							echo '<div class="success animated bounceInDown shida">';
							echo 'Notificación creada';
							echo '</div>';
							include("mail.php");
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
		<div class="animated bounceInDown loginForm">
			<hgroup>
				<h1>Agregar Notificación</h1>
			</hgroup>

			<form action="agregarnotificacion.php" method="POST" class="animated bounceInDown" enctype="multipart/form-data">

				<div class="group">

					<div style="color: black;">
						Tipo de notitficacion

					</div>
					<br>
					<select name="tipo" id="tipo" required autofocus>
						<option selected value="1">General</option>
						<option value="2">Específica</option>
					</select>

				</div>


				<div class="group">
					<div style="color: black;">
						Nombre
					</div>
					<input type="text" name="nombre" class="nombre" required pattern="[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+"><span class="highlight" placeholder="Nombre"></span><span class="bar"></span>
				</div>

				<div class="group">
					<div style="color: black;">
						Fecha
					</div>
					<input type="date" name="fecha"><span class="highlight" required></span><span class="bar"></span>

				</div>

				<div class="group">

					<SELECT NAME="carrera" id="carrera" class="carrera">
						<option>Seleccionar carrera</option>

						<OPTION VALUE="1">ISC</OPTION>
						<OPTION VALUE="2">TICS</OPTION>
						<OPTION VALUE="3">INDUSTRIAL</OPTION>
						<OPTION VALUE="4">ELECTRONICA</OPTION>
						<OPTION VALUE="5">IGE</OPTION>

					</SELECT><span class="highlight" required></span><span class="bar"></span>
				</div>

				<div class="group">
					<textarea cols="35" rows="7" name="descripcion" placeholder="Descripcion"></textarea>

				</div>

				<button type="submit" name="submit" class="buttonui"> <span> Registrar </span>
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
