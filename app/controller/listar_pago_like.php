<?php

if(isset($_POST['data']))
 {	
 	$data = $_POST['data'];
    include('../../config_db/config.php');

    $crud->listar_pago_like($data);
}





?>