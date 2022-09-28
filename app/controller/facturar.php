<?php


 if (isset($_POST['cedula'],$_POST['internet'],$_POST['pago'],$_POST['n_pago'])) 
 {
 	

 	$cedula    = $_POST['cedula'];	
 	$internet  = $_POST['internet'];
 	$pago      = $_POST['pago'];
	$n_pago    = $_POST['n_pago'];
    include('../../config_db/config.php');

    $crud->nuevo_pago ($cedula,$internet,$pago,$n_pago);



 }
?>