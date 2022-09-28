<?php


 if (isset($_POST['cant'],$_POST['cod'],$_POST['nombre'],$_POST['precioc'],$_POST['precioA'],$_POST['precioB'],$_POST['precioC'],$_POST['precioD']))
 {


   $cantidad     = $_POST['cant'];
 	$codigo    = $_POST['cod'];
 	$nombre    = $_POST['nombre'];
 	$precio_compra     = $_POST['precioc'];
  $precioA     = $_POST['precioA'];
 	$precioB     = $_POST['precioB'];
  $precioC     = $_POST['precioC'];
  $precioD     = $_POST['precioD'];

    include('../../config_db/config.php');

  $crud->addproducto($cantidad,$codigo,$nombre,$precio_compra,$precioA,$precioB,$precioC,$precioD);



 }
?>
