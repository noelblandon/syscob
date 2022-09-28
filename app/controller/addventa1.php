<?php
 if(isset($_POST['recibo'],$_POST['nombrec'],$_POST['fventa'],$_POST['prod'],$_POST['vcant'],$_POST['precio'],$_POST['prod1'],$_POST['vcant1'],$_POST['precio1'],$_POST['vdesc1'],$_POST['total'],$_POST['cont'],$_POST['gane'])){
 	$Norecibo    = $_POST['recibo'];
 	$nombrec    = $_POST['nombrec'];
 	$fechaventa     = $_POST['fventa'];
  $nombrep    = $_POST['prod'];
  $precio     = $_POST['precio'];
 	$cantidad     = $_POST['vcant'];
  $nombrep1    = $_POST['prod1'];
  $precio1     = $_POST['precio1'];
 	$cantidad1     = $_POST['vcant1'];
  $descuento    = $_POST['vdesc1'];
  $total     = $_POST['total'];
  $count     = $_POST['cont'];
  $gane     = $_POST['gane'];
    include('../../config_db/config.php');
    $crud->addventa1($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$nombrep1,$cantidad1, $precio1,$count,$gane);
 }
?>
