<?php 

date_default_timezone_set("America/Managua");
session_start();

if ($_SESSION['id_usuario'] == 0){
    header('location: ../index.php');
}

if (!isset($_SESSION['id_usuario'],$_SESSION['casa_user'],$_SESSION['rol_user'])){
   $_SESSION['id_usuario'] = 0; $_SESSION['casa_user'] = 0; $_SESSION['rol_user'] = 0;
   header('location: ../index.php');
}

?>
