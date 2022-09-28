<?php
if (isset($_POST['id'],$_POST['cod'],$_POST['nombre'],$_POST['precioc'],$_POST['precioA'],$_POST['precioB'],$_POST['precioC'],$_POST['precioD'],$_POST['estado'],$_POST['idinventario']))
{
  $idproducto    = $_POST['id'];
  $codigo    = $_POST['cod'];
  $nombre    = $_POST['nombre'];
  $precio_compra     = $_POST['precioc'];
 $precioA     = $_POST['precioA'];
 $precioB     = $_POST['precioB'];
$precioC     = $_POST['precioC'];
$precioD     = $_POST['precioD'];
$estado     = $_POST['estado'];
 $idinventario    = $_POST['idinventario'];
    include('../../config_db/config.php');
    $crud->upProducto($idproducto,$codigo,$nombre,$precio_compra,$precioA,$precioB,$precioC,$precioD,$estado, $idinventario);
 }
?>
