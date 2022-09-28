<?php


 if (isset($_POST['cod'],$_POST['nombre'],$_POST['desc'],$_POST['precio']))
 {


 	$codigo    = $_POST['cod'];
 	$nombre    = $_POST['nombre'];
 	$descripcion     = $_POST['desc'];
  $precio     = $_POST['precio'];

    include('../../config_db/config.php');

    $crud->addTitems($codigo, $nombre, $descripcion, $precio);



 }
?>
