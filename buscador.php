

	<div class="container">
    <div class="row">
    <p></p>
<p> </p>

        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Notificaciones</h3>
                  </div>
                </div>
              </div>
              <div class="panel-body">

						<?php
						error_reporting(0);
						include("mysql.php");

						$tipo = $_POST["tipo"];

						$_SESSION['s_tipo'] = $tipo;

						$query = mysqli_query($mysqli, '(SELECT nombre,descripcion,fecha from notificacion_global WHERE nombre LIKE "%'.$consulta.'%") UNION (SELECT nombre,descripcion,fecha from notificacion_especifica WHERE nombre LIKE "%'.$consulta.'%")') 
							 or die (mysqli_error($mysqli));
//'(SELECT nombre,descripcion,fecha from notificacion_global WHERE nombre LIKE "%cag%") UNION (SELECT nombre,descripcion,fecha from notificacion_especifica WHERE nombre LIKE "%'.$consulta.'%")') 

						$resultado = $mysqli->query('SELECT carrera FROM usuario WHERE usuario = "'.$user.'"');
						$fila = $resultado->fetch_assoc();




						



						?>

						<table class="table table-striped table-bordered table-list">
							<thead>
								<tr>
										<th><em class="fa fa-cog"></em></th>
										<th>Nombre</th>
										<th class="hidden-xs">Descripcion</th>
										<th>Fecha</th>
								</tr>
							</thead>

							<?php
							while ($row = mysqli_fetch_array($query)) {
							?>

							<tbody>
											<tr>
												<td align="center">
													<a class="btn btn-default"><em class="fa fa-pencil"></em></a>
													<a class="btn btn-danger"><em class="fa fa-trash"></em></a>
												</td>
												<td><?php echo $row['nombre']; ?></td>
												<td class="hidden-xs"><?php echo $row['descripcion']; ?></td>
												<td><?php echo $row['fecha']; ?></td>
											</tr>
						<?php }
						?>
					</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="row">

						</div>
					</div>
				</div>

</div></div>
</div>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>



