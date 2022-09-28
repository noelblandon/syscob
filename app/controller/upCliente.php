<?php
if (isset($_POST['id'],$_POST['nombre'],$_POST['dir'],$_POST['tel'],$_POST['desc'],$_POST['estado']))
{
  $idcliente = $_POST['id'];
  $nombre    = $_POST['nombre'];
 $direccion    = $_POST['dir'];
 $telefono     = $_POST['tel'];
 $descuento     = $_POST['desc'];
 $estado    = $_POST['estado'];
    include('../../config_db/config.php');
    $crud->upCliente($idcliente, $nombre, $direccion, $telefono, $descuento,$estado);
 }
?>
