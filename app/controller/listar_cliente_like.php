<?php

if (isset($_POST['data'])) {
	$data = $_POST['data'];

	include('../../config_db/config.php');

    $crud->listar_cliente_like($data);
}
 
    




?>