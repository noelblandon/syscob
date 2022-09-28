<?php


 if (isset($_POST['id'],$_POST['name'],$_POST['rol'])) 
 {
 	

 	$id   = $_POST['id'];
 	$name = $_POST['name'];
 	$rol  = $_POST['rol'];

    include('../../config_db/config.php');

    $crud->upd_user($id,$name,$rol);



 }
 elseif (isset($_POST['id'],$_POST['pass'])) {
 	$id   = $_POST['id'];
 	$pass = md5($_POST['pass']);

    include('../../config_db/config.php');

    $crud->upd_pass($id,$pass);
 }
?>