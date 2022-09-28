<?php
 if(isset($_POST['recibo'])){
 	$Norecibo    = $_POST['recibo'];
    include('../../config_db/config.php');
    $crud->factd($Norecibo);
 }
?>
