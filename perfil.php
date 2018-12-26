
<?php
include("prueba.php");
include("mysql.php");
?>       



<?php
session_start();
$user = $_SESSION['s_usuario'];


$resultado = $mysqli->query('SELECT usuario, n_control, carrera FROM usuario WHERE usuario = "'.$user.'"');
$fila = $resultado->fetch_assoc();


echo '<div class="animated bounceInDown loginForm">
        <hgroup>
            <h1>Mi perfil</h1>
        </hgroup>

    <div class="group">
        <div style="color: black;">Nombre de usuario:</div>
    <div style="color: black;"><br>'.$fila['usuario'].'</div>
      </div>';



echo '<div class="group">
        <div style="color: black;">Numero de control:</div>
        
        <div style="color: black;"><br>'.$fila['n_control'].'</div>
    </div>';




echo '<div class="group">
        <div style="color: black;">Carrera:</div>
        
        <div style="color: black;"><br>';


switch ($fila['carrera']) {
    case 1:
    echo 'ISC';
    break;
    case 2:
    echo 'TICS';
    break;
    case 3:
    echo 'INDUSTRIAL';
    break;
    case 3:
    echo 'ELECTRONICA';
    break;
    case 4:
    echo 'IGE';
    break;
}


        echo '</div>
      </div>';

?>
            <div class="powered">
                NOTIFICAUAQ V1.0
            </div>
    </div>


        


</body>
</html>