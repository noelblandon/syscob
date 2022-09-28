<?php
 if(isset($_POST['idventa'])){
 	$idventa    = $_POST['idventa'];
    include('../../config_db/config.php');
    $crud->listDetalle($idventa);
 }
?>
