
<?php
error_reporting(0);
		  //include("mysql.php");
include "prueba.php";
session_start();
$user = $_SESSION['s_usuario'];
$tipo = $_POST["tipo"];
?>


<body style="background-color:#FFFFFF;">

  <form action="busca_form.php" method="POST" enctype="multipart/form-data">

    <input type="text" name="consulta" required pattern="[A-Za-z0-9-ZñÑáéíóúÁÉÍÓÚ\s]+"></input>
    <button type="submit" name="submit" class="buttonui"> <span> Buscar </span>
      <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
    </button>  

        <button name="cancelar" class="buttonui" onclick="window.location = 'busca_form.php'"> <span> Cancelar </span>
      <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
    </button>  


    <div id="main-container">
      <div class="form__top">
       <h2>Notificaciones

    </h2>
  </div>
</div>
<?php
error_reporting(0);
$consulta = $_POST["consulta"];
if($consulta!=NULL){
  include "buscador.php";
}

?>

<footer id="contentinfo" role="contentinfo"></footer>
</form>
</body>
</html>
