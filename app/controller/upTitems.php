<?php
 if (isset($_POST['id'],$_POST['cod'],$_POST['nombre'],$_POST['desc'],$_POST['precio']))
 {
   $iditems    = $_POST['id'];
 	$codigo    = $_POST['cod'];
 	$nombre    = $_POST['nombre'];
 	$descripcion     = $_POST['desc'];
  $precio     = $_POST['precio'];

    include('../../config_db/config.php');

    $crud->upTitems($iditems, $codigo, $nombre, $descripcion, $precio);

 }
?>
