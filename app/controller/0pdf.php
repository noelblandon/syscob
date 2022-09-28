<?php

date_default_timezone_set("America/Managua");
if (isset($_GET['cedula'])) {
	session_start();
	 $n_pago  = $_SESSION['n_pagos'];
	$cedula   = $_GET['cedula'];



require '../../assets/pdf/fpdf.php';

require '../../config_db/config.php';

 $crud->factura_pago ($n_pago,$cedula);



class PDF extends FPDF
{


	function Header()
	{
		//cabecera del pdf
		//logo
		//$this->Image('../../assets/img/logo.png',0,5,30);
		//fuente
		$this->SetFont('Arial','B',10);
		//movernos a la derecha

		//Imagen izquierda
$this->Image('../../assets/img/fondo.png', 20, 27, 30, 30, 'PNG');

//Imagen derecha
//$this->Image('../../assets/img/csi.jpg', 145, 27, 40, 22, 'JPG');

//Texto de Título
$this->SetFont('Arial','BI',20);
$this->SetXY(15, 38);
$this->MultiCell(200, 5, utf8_decode('Centro de Soluc0000iones Informáticas'), 0, 'C');


//aca estaba informaticas
//$this->SetXY(45, 37);
//$this->MultiCell(70, 5, utf8_decode(''), 0, 'C');

//Texto Explicativo
$this->SetFont('Courier','', 8);
$this->SetXY(60, 48);
$this->MultiCell(70, 5, utf8_decode('Busca Resultados, Tenemos Soluciones'), 0, 'C');
//Texto Explicativo

$this->SetXY(60, 55);
$this->MultiCell(80, 5, utf8_decode('Propietario: MSc. José Andrés Carrasco Torres'), 0, 'C');
$this->SetXY(60, 60);
$this->MultiCell(70, 5, utf8_decode('Dirección: Gobernación 1 cuadra al este 15vrs al sur Estelí, Estelí'), 0, 'C');
$this->SetXY(60, 70);
$this->MultiCell(70, 5, utf8_decode('Celular: 89268894'), 0, 'C');
$this->SetXY(60, 74);

$date = date('d-m-Y');
 $date = strtotime("-0 days",strtotime($date) );
 $date = date('d-m-Y',($date));
$this->SetXY(145, 68);
$this->MultiCell(40,10,utf8_decode('      '.$date),1,'L');
$this->SetFont('Courier','B', 8);
$this->SetXY(145, 61);
$this->MultiCell(40,10,utf8_decode('        Fecha'),0,'L');
$this->Ln();





	}

	function Datos()
	{


			$pixel = 121.5;
			$total_pago = 0;
			for ($i = 1; $i <= $_SESSION['n_pagos'] ; $i++)
			{

		 	$fecha      = $_SESSION['fecha'][$i];
		 	$nombre     = $_SESSION['nombre'][$i];
		 	$direccion  = $_SESSION['direccion'][$i];
		 	$ubicacion  = $_SESSION['ubicacion'][$i];
		 	$mb         = $_SESSION['mb'][$i] ;
		 	$pago       = $_SESSION['pago'][$i];
		 	$total_pago = $total_pago + $pago;

		 	$_SESSION['name'] = $nombre;



		 	/* datos del body*/
		$this->SetFont('Courier','', 10);

		$this->SetXY(14, $pixel);
		$this->MultiCell(42.5,5,utf8_decode($mb .' MB'),0,'C');
		$this->SetXY(50, $pixel);
		$this->MultiCell(70,5,utf8_decode($fecha ),0,'C');

		$this->SetXY(115, $pixel);
		$this->MultiCell(43,5,utf8_decode('$ '.$pago ),0,'C');
		$this->SetXY(150, $pixel);
		$this->MultiCell(41.5,5,utf8_decode('$ '.$pago ),0,'C');

		$pixel = $pixel + 7;

			}
		$this->Ln('8');
		$this->SetFont('Courier','', 10);
		$this->SetXY(20, 90);
		$this->MultiCell(170,22,utf8_decode(''),1,'L');
		$this->SetFont('Courier','B', 10);
		$this->SetXY(22, 85);
		$this->MultiCell(170,20,utf8_decode('Cliente: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(45, 85);
		$this->MultiCell(170,20,utf8_decode($nombre),0,'L');
		$this->SetFont('Courier','B', 10);
		$this->SetXY(22, 90);
		$this->MultiCell(170,20,utf8_decode('Dirección: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(45, 98);
		$this->MultiCell(142,4,utf8_decode($direccion.', '.$ubicacion),0,'L');

		$this->SetXY(20, 114);
		$this->MultiCell(170,100,utf8_decode(''),1,'L');
		$this->SetFillColor(232,232,232);
		$this->SetFont('Courier','B', 10);
		$this->SetXY(21, 115);
		$this->MultiCell(30,5,utf8_decode('Cantidad'),0,'C',1);
		$this->SetXY(50, 115);
		$this->MultiCell(70,5,utf8_decode('Mes a pagar'),0,'C',1);

		$this->SetXY(115, 115);
		$this->MultiCell(43,5,utf8_decode('Precio Unitario'),0,'C',1);
		$this->SetXY(153, 115);
		$this->MultiCell(35,5,utf8_decode('Total'),0,'C',1);
		/* datos del body*/







		/* pie del body de la factura*/
		$this->SetFont('Courier','', 10);
		$this->SetXY(20, 216);
		$this->MultiCell(135,35,utf8_decode(''),0,'L');
		$this->SetFont('Courier','B', 8);
		$this->SetXY(20, 217);
		$this->MultiCell(135,3,utf8_decode('Mantenimiento de valor: '),0,'L');
		$this->SetFont('Courier','', 8);
		$this->SetXY(20, 221);
		$this->MultiCell(135,3,utf8_decode('El valor de la presente Factura queda sujeto al mantenimiento de valor del córdoba con respecto al dolar de los EE.UU, conforme al ARTO. 16 de la ley Monetaria.'),0,'J');
		$this->SetXY(160, 217);
		$this->SetFont('Courier','B', 8);
		$this->SetXY(20, 231);
		$this->MultiCell(135,3,utf8_decode('Mora: '),0,'L');
		$this->SetFont('Courier','', 8);
		$this->SetXY(20, 234);
		$this->MultiCell(135,3,utf8_decode('En caso de falta de pago en la fecha indicada Incurrirá (mas) en mora sin necesidad de requerimiento judicial y extrajudicial.'),0,'J');
		$this->SetXY(160, 217);
		$this->MultiCell(30,25,utf8_decode('$ '.$total_pago),1,'C');





	}
	function Footer()
	{
	    $this->SetFont('Courier','', 8);
		$this->SetXY(10, -25);
		$this->MultiCell(70, 5, utf8_decode('Entregue Conforme'), 0, 'C');
		$this->SetXY(10, -25);
		$this->MultiCell(70, 20, utf8_decode(''), 1, 'C');
		 $this->SetFont('Courier','', 8);
		 $this->SetXY(130,-25);
		$this->MultiCell(70, 5, utf8_decode('Recibi Conforme'), 0, 'C');
		$this->SetXY(130,-25);
		$this->MultiCell(70, 20, utf8_decode(''), 1, 'C');


	}







}
		 $date = date('d-m-Y');
		 $date = strtotime("-0 days",strtotime($date) );
		 $date = date('d-m-Y',($date));




			$pdf = new PDF('P','mm','Letter');
			$pdf->SetFont('Arial',10);
			$pdf->AddPage();
			$pdf->Datos();
			$pdf->Output();
			$pdf->Output('../../facturas/'.$date.' '.$_SESSION['name'].'.pdf');




}

 ?>
