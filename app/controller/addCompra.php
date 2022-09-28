<?php


 if (isset($_POST['prod'],$_POST['cant'],$_POST['precioc'],$_POST['precioc'],$_POST['precioA'],$_POST['precioB'],$_POST['precioC'],$_POST['precioD'],$_POST['fcompra'],$_POST['proveedorID']))
 {


   $producto     = $_POST['prod'];
 	$cantidad    = $_POST['cant'];
 	$precioc     = $_POST['precioc'];
 	$precioIVA     = $_POST['precioIVA'];
 	$precioA     = $_POST['precioA'];
 	$precioB     = $_POST['precioB'];
 	$precioC     = $_POST['precioC'];
 	$precioD     = $_POST['precioD'];
  $fcompra     = $_POST['fcompra'];
  $idproveedor     = $_POST['proveedorID'];

    include('../../config_db/config.php');

  $crud->addCompra($producto,$cantidad,$precioc,$precioIVA,$precioA,$precioB,$precioC,$precioD,$fcompra, $idproveedor);



 }
?>
