<?php
 if(isset($_POST['ex'],$_POST['id'],$_POST['ex1'],$_POST['id1'],$_POST['ex2'],$_POST['id2'],$_POST['cont'])){

  $cantidad     = $_POST['ex'];
  $idinventario     = $_POST['id'];
  $cantidad1     = $_POST['ex1'];
  $idinventario1     = $_POST['id1'];
  $cantidad2     = $_POST['ex2'];
  $idinventario2     = $_POST['id2'];
  $count     = $_POST['cont'];
    include('../../config_db/config.php');
    $crud->updateventa2($cantidad,$idinventario,$cantidad1,$idinventario1,$cantidad2,$idinventario2,$count);
 }
?>
