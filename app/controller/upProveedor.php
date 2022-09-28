<?php


 if (isset($_POST['id'],$_POST['nombre'],$_POST['dir'],$_POST['tel'],$_POST['correo'],$_POST['estado']))
 {

$id     = $_POST['id'];
   $nombre     = $_POST['nombre'];
 	$direccion    = $_POST['dir'];
 	$telefono    = $_POST['tel'];
 	$correo     = $_POST['correo'];
 	$estado     = $_POST['estado'];


    include('../../config_db/config.php');

  $crud->upProveedor($id, $nombre,$direccion,$telefono,$correo,$estado);



 }
?>
