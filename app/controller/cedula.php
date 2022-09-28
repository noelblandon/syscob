
<?php


if (isset($_POST['cedula'])) {
	

	$pass = $_POST['cedula'];

	if (preg_match('/^\d{3,3}\-\d{6,6}\-\d{4,4}$/', $pass)) {

			echo'1';
	
	}else{
		echo'0';
		 
	}




}



?>