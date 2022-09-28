<?php


 if (isset($_POST['name'],$_POST['pass'],$_POST['rol'])) 
 {
 	

 	$name    = $_POST['name'];
 	$pass    = md5($_POST['pass']);
 	$rol     = $_POST['rol'];

    include('../../config_db/config.php');

    $crud->nuevo_user($name,$pass,$rol);



 }
?>