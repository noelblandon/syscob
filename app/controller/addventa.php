<?php
 if(isset($_POST['recibo'],$_POST['nombrec'],$_POST['fventa'],$_POST['prod'],$_POST['vcant'],$_POST['precio'],$_POST['vdesc1'],$_POST['total'],$_POST['cont'],$_POST['ex'],$_POST['id'],$_POST['gane'])){
 	$Norecibo    = $_POST['recibo'];
 	$nombrec    = $_POST['nombrec'];
 	$fechaventa     = $_POST['fventa'];
  $nombrep    = $_POST['prod'];
  $precio     = $_POST['precio'];
 	$cantidad     = $_POST['vcant'];
  $descuento    = $_POST['vdesc1'];
  $total     = $_POST['total'];
  $count     = $_POST['cont'];
  $ex     = $_POST['ex'];
  $idinvd     = $_POST['id'];
  $gane     = $_POST['gane'];
    include('../../config_db/config.php');
    $crud->addventa($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$count,$ex,$idinv,$gane);
 }
?>
