<?php


 if (isset($_POST['nombre'])) 
 {
 	

 	$nombre    = md5($_POST['nombre']);

    include('../../config_db/config.php');

    $crud->actualizar_pass($nombre);



 }
?>