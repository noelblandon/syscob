<?php
 if (isset($_POST['idcompra'],$_POST['prod'],$_POST['cant'],$_POST['precioc'],$_POST['precioIVA'],$_POST['precioA'],$_POST['precioB'],$_POST['precioC'],$_POST['precioD'],$_POST['fcompra'],$_POST['proveedorID']))
 {
   $idcompra     = $_POST['idcompra'];
   $producto     = $_POST['prod'];
 	$cantidad    = $_POST['cant'];
 	$precioc    = $_POST['precioc'];
 	$precioIVA    = $_POST['precioIVA'];
 	$precioA     = $_POST['precioA'];
 	$precioB     = $_POST['precioB'];
 	$precioC     = $_POST['precioC'];
 	$precioD     = $_POST['precioD'];
  $fcompra     = $_POST['fcompra'];
  $idproveedor     = $_POST['proveedorID'];
    include('../../config_db/config.php');
  $crud->upCompra($idcompra,$producto,$cantidad,$precioc,$precioIVA,$precioA, $precioB,$precioC,$precioD,$fcompra, $idproveedor);
 }
?>
