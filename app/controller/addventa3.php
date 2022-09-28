<?php
 if(isset($_POST['recibo'],$_POST['nombrec'],$_POST['fventa'],$_POST['prod'],$_POST['vcant'],$_POST['precio'],$_POST['prod1'],$_POST['vcant1'],$_POST['precio1'],$_POST['prod2'],$_POST['vcant2'],$_POST['precio2'],$_POST['prod3'],$_POST['vcant3'],$_POST['precio3'],$_POST['vdesc1'],$_POST['total'],$_POST['cont'],$_POST['gane']))
 {
     $Norecibo    = $_POST['recibo'];
    	$nombrec    = $_POST['nombrec'];
    	$fechaventa     = $_POST['fventa'];
     $nombrep    = $_POST['prod'];
     $precio     = $_POST['precio'];
    	$cantidad     = $_POST['vcant'];
     $nombrep1    = $_POST['prod1'];
     $precio1     = $_POST['precio1'];
    	$cantidad1     = $_POST['vcant1'];
     $nombrep2    = $_POST['prod2'];
     $precio2     = $_POST['precio2'];
    	$cantidad2     = $_POST['vcant2'];
      $nombrep3    = $_POST['prod3'];
      $precio3     = $_POST['precio3'];
     	$cantidad3     = $_POST['vcant3'];
     $descuento    = $_POST['vdesc1'];
     $total     = $_POST['total'];
     $count     = $_POST['cont'];
     $gane     = $_POST['gane'];
       include('../../config_db/config.php');
       $crud->addventa3($Norecibo,$nombrec,$fechaventa,$descuento,$total,$nombrep,$cantidad, $precio,$nombrep1,$cantidad1,$precio1,$nombrep2,$cantidad2,$precio2,$nombrep3,$cantidad3,$precio3,$count,$gane);
 }
?>
