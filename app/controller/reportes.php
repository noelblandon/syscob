<?php
date_default_timezone_set("America/Managua");

 if (isset($_POST['anio'])) {
 	
 	$anio = $_POST['anio'];

if ($anio > 0) {
	include('../../config_db/config.php');

    $crud->reporte_cliente($anio);
}
 	 

 }
   




?>