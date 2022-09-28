<?php


 if (isset($_POST['nombre'])) 
 {
 	

 	$nombre    = $_POST['nombre'];

    include('../../config_db/config.php');

    $crud->actualizar_nombre($nombre);



 }
?>