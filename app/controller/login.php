<?php

if (isset($_POST['user'],$_POST['pass'])) {
	
$name = $_POST['user'];
$pass = md5($_POST['pass']);
 
    include('../../config_db/config.php');

    $crud->login($name,$pass);

}


?>