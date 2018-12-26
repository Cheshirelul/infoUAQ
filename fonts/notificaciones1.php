
<?php
error_reporting(0);
		  //include("mysql.php");

session_start();
$user = $_SESSION['s_usuario'];
$tipo = $_POST["tipo"];
?>





      <form action="notifica.php" method="POST" enctype="multipart/form-data">
  		<div id="main-container">
  		<div class="form__top">
			<h2>Notificacion
        <span class="form__reg">
  			  <select class="input_tipo" name="tipo" onchange="submit()" required autofocus>
            <?php if ($tipo == "2"){ ?>
              <option value="1">General</option>
    			    <option selected value="2">Específica</option>
            <?php }else{ ?>
              <option selected value="1">General</option>
    			    <option value="2">Específica</option>
            <?php } ?>
  		    </select>
        </span>
      </h2>
      </div>
    </div>
<?php
error_reporting(0);
include "TablaRes.php";
?>

        <footer id="contentinfo" role="contentinfo"></footer>
        </form>
    </body>
</html>
