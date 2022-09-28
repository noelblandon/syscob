<?php


 if (isset($_POST['nombre'],$_POST['dir'],$_POST['tel'],$_POST['correo']))
 {


   $nombre     = $_POST['nombre'];
 	$direccion    = $_POST['dir'];
 	$telefono    = $_POST['tel'];
 	$correo     = $_POST['correo'];
$estado=1;

    include('../../config_db/config.php');

  $crud->addProveedor($nombre,$direccion,$telefono,$correo,$estado);



 }
?>
