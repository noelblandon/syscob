<?php


 if (isset($_POST['cedula'])) 
 {
 	

 	$cedula    = $_POST['cedula'];
 	
 
    include('../../config_db/config.php');

    $crud->eliminar_user($cedula);



 }
?>