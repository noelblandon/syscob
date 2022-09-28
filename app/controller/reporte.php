<?php
setlocale(LC_ALL, 'es_NI');
date_default_timezone_set("America/Managua");

//if(isset($_GET['nombrec'],$_GET['prod'],$_GET['vcant'],$_GET['precio'],$_GET['vdesc1'],$_GET['total'])){
  	session_start();
require '../../assets/pdf/fpdf.php';
require '../../config_db/config.php';

 $crud->verventas();

class PDF extends FPDF{
  function Header(){
    $this->Line(148, 0, 148, 209); //Vertical
		$this->Image('../../assets/img/fondo.png', 83, 10, 20, 20, 'PNG');
		$this->SetFont('Arial','BI',18);
    $this->SetXY(98, 22);
    $this->MultiCell(100, 0, utf8_decode('Reporte de Ventas'), 0, 'C');

    $this->SetFont('Arial','B',10);
     $currentdate1 = date("d");
     $currentdate2 = date("F");
     $currentdate3 = date("y");
       $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
         $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $this->SetXY(205, 18);
    $this->MultiCell(25,10,utf8_decode('Fecha  '.$currentdate1.'  de'),0,'L');
    $this->Line(218, 25 , 223, 25);
    $this->SetXY(233, 18);
    $this->MultiCell(28,10,utf8_decode(str_replace($meses_EN, $meses_ES, $currentdate2)),0,'C');
    $this->Line(230, 25 , 263, 25);
    $this->SetXY(265, 18);
    $this->MultiCell(40,10,utf8_decode('del'),0,'L');
    $this->SetXY(275, 18);
    $this->MultiCell(6,10,utf8_decode($currentdate3),0,'L');
    $this->Line(275, 25 , 280, 25);
    $this->Ln();


  }
  function fun(){
    $this->SetFont('Arial','B',14);
    $this->SetXY(15, 50);
    $this->MultiCell(265,10,utf8_decode(),1,'L');
    $this->SetXY(15, 50);
    $this->MultiCell(55,10,utf8_decode('No Recibo'),1,'L');
    $this->SetXY(70, 50);
    $this->MultiCell(55,10,utf8_decode('Nombre'),1,'L');
    $this->SetXY(125, 50);
    $this->MultiCell(50,10,utf8_decode('Fecha de venta'),1,'L');
    $this->SetXY(175, 50);
    $this->MultiCell(55,10,utf8_decode('Descuento'),1,'L');
    $this->SetXY(230, 50);
    $this->MultiCell(50,10,utf8_decode('Total'),1,'L');

$pixel = 60;
for ($i = 1; $i <= 5 ; $i++)
{
/* datos del body*/
$this->SetFont('Arial','B',12);
$this->SetXY(15, $pixel);
$this->MultiCell(265,8,utf8_decode(),1,'L');
$this->SetXY(15, $pixel);
$this->MultiCell(55,8,utf8_decode($_GET['re'][$i]),1,'L');
$this->SetXY(70, $pixel);
$this->MultiCell(55,8,utf8_decode($i),1,'L');
$this->SetXY(125, $pixel);
$this->MultiCell(50,8,utf8_decode($_GET['venta']['re'][$i]),1,'L');
$this->SetXY(175, $pixel);
$this->MultiCell(55,8,utf8_decode('Descuento'),1,'L');
$this->SetXY(230, $pixel);
$this->MultiCell(50,8,utf8_decode('Total'),1,'L');
if ($_POST['cont']==15) {
  $this->addPage();
}

$pixel = $pixel + 8;
}


  }
  function Footer(){


  }

  }
	$currentdate1 = date("d");
	$currentdate2 = date("F");
	$currentdate3 = date("y");
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
      $date = date('d-m-Y H:i:s');
      $date =	strtotime("-0 days",strtotime($date) );
      $date =	date('d-m-Y H:i:s',($date));
  $pdf = new PDF('L', 'mm', 'A4');
  $pdf->SetFont('Arial','B',16);
  $pdf->AddPage();
  $pdf->fun();
  $pdf->Output();
	//$pdf->Output('../../facturas/'.$date.'.'.pdf');
//}

?>
