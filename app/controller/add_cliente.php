<?php


 if (isset($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['direccion'],$_POST['barrio'],$_POST['comunidad'],$_POST['celular'],$_POST['pago'],$_POST['internet'])) 
 {
 	

 	$cedula    = $_POST['cedula'];
 	$nombre    = $_POST['nombre'];
 	$apellido  = $_POST['apellido'];
 	$direccion = $_POST['direccion'];
 	$barrio    = $_POST['barrio'];
 	$comunidad = $_POST['comunidad']; 
 	$celular   = $_POST['celular'];
 	$pago      = $_POST['pago'];
 	$internet  = $_POST['internet'];

    include('../../config_db/config.php');

    $crud->nuevo_cliente($cedula,$nombre,$apellido,$direccion,$barrio,$comunidad,$celular,$pago,$internet);



 }
?>