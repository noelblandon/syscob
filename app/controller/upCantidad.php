<?php


 if (isset($_POST['cant'],$_POST['idinventario']))
 {

 	$cantidad    = $_POST['cant'];
  $idinventario     = $_POST['idinventario'];

    include('../../config_db/config.php');

  $crud->upCantidad($cantidad,$idinventario);



 }
?>
