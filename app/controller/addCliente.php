<?php


 if (isset($_POST['nombre'],$_POST['dir'],$_POST['tel'],$_POST['desc']))
 {


 	$nombre    = $_POST['nombre'];
 	$direccion    = $_POST['dir'];
 	$telefono     = $_POST['tel'];
  $descuento     = $_POST['desc'];

    include('../../config_db/config.php');

    $crud->addCliente($nombre, $direccion, $telefono, $descuento);



 }
?>
