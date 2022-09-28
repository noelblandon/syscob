<?php
 if(isset($_POST['ex'],$_POST['id'],$_POST['cont'])){

  $cantidad     = $_POST['ex'];
  $idinventario     = $_POST['id'];
  $count     = $_POST['cont'];
    include('../../config_db/config.php');
    $crud->updateventa($cantidad,$idinventario,$count);
 }
?>
