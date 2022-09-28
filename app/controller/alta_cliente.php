<?php


 if (isset($_POST['cedula'],$_POST['pago'],$_POST['internet'])) 
 {
 	

 	$cedula    = $_POST['cedula'];
 	$pago      = $_POST['pago'];
 	$internet  = $_POST['internet'];

    include('../../config_db/config.php');

    $crud->activar_cliente($cedula,$internet,$pago);



 }
?>