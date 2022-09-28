<?php
 if(isset($_POST['ex'],$_POST['id'],$_POST['ex1'],$_POST['id1'],$_POST['cont'])){

  $cantidad     = $_POST['ex'];
  $idinventario     = $_POST['id'];
  $cantidad1     = $_POST['ex1'];
  $idinventario1     = $_POST['id1'];
  $count     = $_POST['cont'];
    include('../../config_db/config.php');
    $crud->updateventa1($cantidad,$idinventario,$cantidad1,$idinventario1,$count);
 }
?>
