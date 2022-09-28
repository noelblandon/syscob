<?php
setlocale(LC_ALL, 'es_NI');
date_default_timezone_set("America/Managua");

if(isset($_GET['idventa'],$_GET['nombrec'],$_GET['vdesc1'],$_GET['total'])){
  	session_start();
    $idventa   = $_GET['idventa'];
require '../../assets/pdf/fpdf.php';
require '../../config_db/config.php';

 $crud->listDetall($idventa);

class PDF extends FPDF{
  function Header(){
    #$this->Image('logo.png', 11, 15, 30, 30, 'PNG');
		$this->Image('../../assets/img/fondo.png', 11, 15, 30, 30, 'PNG');
		$this->SetFont('Arial','BI',14);
    $this->SetXY(40, 20);
    $this->MultiCell(100, 0, utf8_decode('Centro de Soluciones Informáticas'), 0, 'C');
    $this->SetXY(40, 26);
    $this->MultiCell(100, 0, utf8_decode('JACVIDEO'), 0, 'C');
    $this->SetFont('Arial','B',10);
$this->SetXY(50, 32);
    $this->MultiCell(90, 0, utf8_decode('Propietario: MSc. José Andrés Carrasco Torres'), 0, 'L');
$this->SetXY(50, 36);
    $this->MultiCell(90, 0, utf8_decode('Dirección: Productos Briomol, 1/2 cuadra al oeste.'), 0, 'L');
$this->SetXY(50, 40);
    $this->MultiCell(90, 0, utf8_decode('Correo: csijacvideo@outlook.com'), 0, 'L');
$this->SetXY(50, 44.5);
    $this->MultiCell(90, 0, utf8_decode('Teléfono: 2713-2816'), 0, 'L');
     $currentdate1 = date("d");
     $currentdate2 = date("F");
     $currentdate3 = date("y");
       $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
         $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $this->SetXY(64, 48);
    $this->MultiCell(25,10,utf8_decode('Fecha  '.$currentdate1.'  de'),0,'L');
    $this->Line(76, 55 , 81.5, 55);
    $this->SetXY(88, 48);
    $this->MultiCell(28,10,utf8_decode(str_replace($meses_EN, $meses_ES, $currentdate2)),0,'C');
    $this->Line(88, 55 , 116, 55);
    $this->SetXY(116.5, 48);
    $this->MultiCell(40,10,utf8_decode('del'),0,'L');
    $this->SetXY(124, 48);
    $this->MultiCell(6,10,utf8_decode($currentdate3),0,'L');
    $this->Line(124, 55 , 130, 55);
    $this->Ln();
$this->Image('../../assets/img/fondo.png', 159, 15, 30, 30, 'PNG');
    #$this->Image('logo.png', 159, 15, 30, 30, 'PNG');
    $this->SetFont('Arial','BI',14);
    $this->SetXY(188, 20);
    $this->MultiCell(100, 0, utf8_decode('Centro de Soluciones Informáticas'), 0, 'C');
    $this->SetXY(188, 26);
    $this->MultiCell(100, 0, utf8_decode('JACVIDEO'), 0, 'C');
    $this->SetFont('Arial','B',10);
$this->SetXY(198, 32);
    $this->MultiCell(90, 0, utf8_decode('Propietario: MSc. José Andrés Carrasco Torres'), 0, 'L');
$this->SetXY(198, 36);
    $this->MultiCell(90, 0, utf8_decode('Dirección: Productos Briomol, 1/2 cuadra al oeste.'), 0, 'L');
$this->SetXY(198, 40);
    $this->MultiCell(90, 0, utf8_decode('Correo: csijacvideo@outlook.com'), 0, 'L');
$this->SetXY(198, 44.5);
    $this->MultiCell(90, 0, utf8_decode('Teléfono: 2713-2816'), 0, 'L');
     $currentdate1 = date("d");
     $currentdate2 = date("F");
     $currentdate3 = date("y");
       $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
         $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $this->SetXY(212, 48);
    $this->MultiCell(25,10,utf8_decode('Fecha  '.$currentdate1.'  de'),0,'L');
    $this->Line(224, 55 , 229.5, 55);
    $this->SetXY(236, 48);
    $this->MultiCell(28,10,utf8_decode(str_replace($meses_EN, $meses_ES, $currentdate2)),0,'C');
    $this->Line(236, 55 , 264, 55);
    $this->SetXY(264.5, 48);
    $this->MultiCell(40,10,utf8_decode('del'),0,'L');
    $this->SetXY(272, 48);
    $this->MultiCell(6,10,utf8_decode($currentdate3),0,'L');
    $this->Line(272, 55 , 279, 55);
    $this->Ln();

  }
  function fun(){
    $pixel = 84;

    for ($i = 0; $i <= 5; $i++){
      $nombrep  = $_SESSION['nombrep'][$i];
      $cantidad  = $_SESSION['cantidad'][$i];
      $precio         = $_SESSION['precio'][$i] ;
    /* datos del body*/
    $this->SetFont('Courier','', 10);
    $this->SetXY(11, $pixel);
    $this->MultiCell(20,5,utf8_decode($cantidad),0,'C');
    $this->SetXY(31, $pixel);
    $this->MultiCell(65,5,utf8_decode($nombrep),0,'C');
    $this->SetXY(96, 96);
    $this->MultiCell(20,5,utf8_decode(),0,'C');
    $this->SetXY(116, $pixel);
    $this->MultiCell(20,5,utf8_decode('$ '.$precio),0,'C');
    /* datos del body*/
    $this->SetFont('Courier','', 10);
    $this->SetXY(159, $pixel);
    $this->MultiCell(20,5,utf8_decode($cantidad),0,'C');
    $this->SetXY(179, $pixel);
    $this->MultiCell(65,5,utf8_decode($nombrep),0,'C');
    $this->SetXY(244, 96);
    $this->MultiCell(20,5,utf8_decode(),0,'C');
    $this->SetXY(264, $pixel);
    $this->MultiCell(20,5,utf8_decode('$ '.$precio),0,'C');
/* datos del body*/
//$i++;
$pixel = $pixel + 6;
}

    $this->SetFont('Courier','',10);
    $this->SetXY(11, 58);
  $this->MultiCell(125,14,utf8_decode(''),1,'L');
  $this->SetFont('Courier','B', 10);
  $this->SetXY(13, 60);
  $this->MultiCell(20,5,utf8_decode('Cliente: '),0,'L');
  $this->SetFont('Courier','', 10);
  $this->SetXY(32, 52.5);
$this->MultiCell(170,20,utf8_decode($_GET['nombrec']),0,'L');
  $this->SetFont('Courier','B', 10);
  $this->SetXY(13, 65.5);
  $this->MultiCell(25,5,utf8_decode('Dirección: '),0,'L');
  $this->SetFont('Courier','', 10);
  $this->SetXY(37, 66);
  $this->MultiCell(142,4,utf8_decode('Estelí'),0,'L');
  $this->SetXY(11, 74);
$this->MultiCell(125,80,utf8_decode(''),1,'L');
$this->SetFont('Courier','B', 10);
$this->SetXY(11, 74);
$this->MultiCell(20,10,utf8_decode('Cantidad'),1,'C');
$this->SetXY(11, 84);
$this->MultiCell(20,57,utf8_decode(''),1,'L');
$this->SetFont('Courier','B', 10);
$this->SetXY(31, 74);
$this->MultiCell(65,10,utf8_decode('Mes a pagar'),1,'C');
$this->SetXY(31, 84);
$this->MultiCell(65,57,utf8_decode(''),1,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(96, 74);
$this->MultiCell(20,10,utf8_decode(''),1,'L');
$this->SetXY(96, 84);
$this->MultiCell(20,57,utf8_decode(''),1,'L');
$this->SetFont('Courier','B', 10);
$this->SetXY(96, 72);
$this->MultiCell(20,10,utf8_decode('Precio'),0,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(96, 76);
$this->MultiCell(20,10,utf8_decode('Unitario'),0,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(116, 74);
$this->MultiCell(20,10,utf8_decode('Total'),1,'C');
$this->SetXY(116, 84);
$this->MultiCell(20,57,utf8_decode(''),1,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(116, 146);
$this->MultiCell(20,8,utf8_decode('$ '.$_GET['total']),1,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(11, 146);
$this->MultiCell(20,8,utf8_decode('Total'),1,'C');
$this->SetXY(11, 141);
$this->MultiCell(105,5,utf8_decode('Descuento'),1,'R');
$this->SetXY(116, 141);
$this->MultiCell(20,5,utf8_decode('$ '.round($_GET['vdesc1'],2)),1,'C');


    $this->Line(148, 0, 148, 209); //Vertical
    $this->SetFont('Courier','',10);
    $this->SetXY(159, 58);
  $this->MultiCell(125,14,utf8_decode(''),1,'L');
  $this->SetFont('Courier','B', 10);
  $this->SetXY(161, 60);
  $this->MultiCell(20,5,utf8_decode('Cliente: '),0,'L');
  $this->SetFont('Courier','', 10);
  $this->SetXY(180, 52.5);
  $this->MultiCell(170,20,utf8_decode($_GET['nombrec']),0,'L');
  $this->SetFont('Courier','B', 10);
  $this->SetXY(161, 65.5);
  $this->MultiCell(25,5,utf8_decode('Dirección: '),0,'L');
  $this->SetFont('Courier','', 10);
  $this->SetXY(185, 66);
  $this->MultiCell(100,4,utf8_decode('Estelí'),0,'L');
  $this->SetXY(159, 74);
$this->MultiCell(125,80,utf8_decode(''),1,'L');
$this->SetFont('Courier','B', 10);
$this->SetXY(159, 74);
$this->MultiCell(20,10,utf8_decode('Cantidad'),1,'C');
$this->SetXY(159, 84);
$this->MultiCell(20,57,utf8_decode(''),1,'L');
$this->SetFont('Courier','B', 10);
$this->SetXY(179, 74);
$this->MultiCell(65,10,utf8_decode('Mes a pagar'),1,'C');
$this->SetXY(179, 84);
$this->MultiCell(65,57,utf8_decode(''),1,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(244, 74);
$this->MultiCell(20,10,utf8_decode(''),1,'L');
$this->SetXY(244, 84);
$this->MultiCell(20,57,utf8_decode(''),1,'L');
$this->SetFont('Courier','B', 10);
$this->SetXY(244, 72);
$this->MultiCell(20,10,utf8_decode('Precio'),0,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(244, 76);
$this->MultiCell(20,10,utf8_decode('Unitario'),0,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(264, 74);
$this->MultiCell(20,10,utf8_decode('Total'),1,'C');
$this->SetXY(264, 84);
$this->MultiCell(20,57,utf8_decode(''),1,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(264, 146);
$this->MultiCell(20,8,utf8_decode('$ '.$_GET['total']),1,'C');
$this->SetFont('Courier','B', 10);
$this->SetXY(159, 146);
$this->MultiCell(20,8,utf8_decode('Total'),1,'C');
$this->SetXY(159, 141);
$this->MultiCell(105,5,utf8_decode('Descuento'),1,'R');
$this->SetXY(264, 141);
$this->MultiCell(20,5,utf8_decode('$ '.round($_GET['vdesc1'],2)),1,'C');

    #$this->SetXY(11, 15);
  #$this->MultiCell(125,169,utf8_decode(''),1,'L');



  /* pie del body de la factura*/
  $this->SetFont('Arial','B', 9);
  $this->SetXY(14, 156);
  $this->MultiCell(44,3,utf8_decode('Mantenimiento de valor: '),0,'L');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(52, 156);
  $this->MultiCell(80,3,utf8_decode('El valor de la presente Factura queda sujeto al '),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(14, 160);
  $this->MultiCell(118,4,utf8_decode('mantenimiento de valor del córdoba con respecto al dolar de los EE.UU, conforme al Arto. 16 de la ley Monetaria.'),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(14, 164);
  $this->MultiCell(118,3,utf8_decode(''),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(14, 170);
  $this->MultiCell(12,3,utf8_decode('Mora: '),0,'L');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(24, 170);
  $this->MultiCell(108,3,utf8_decode('En caso de falta de pago en la fecha indicada Incurrirá (mas) en mora '),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(14, 174);
  $this->MultiCell(118,3,utf8_decode('sin necesidad de requerimiento judicial y extrajudicial.'),0,'J');

  /* pie del body de la factura*/
  $this->SetFont('Arial','B', 9);
  $this->SetXY(158, 156);
  $this->MultiCell(44,3,utf8_decode('Mantenimiento de valor: '),0,'L');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(196, 156);
  $this->MultiCell(80,3,utf8_decode('El valor de la presente Factura queda sujeto al '),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(158, 160);
  $this->MultiCell(118,3,utf8_decode('mantenimiento de valor del córdoba con respecto al dolar de los EE.UU, '),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(158, 164);
  $this->MultiCell(118,3,utf8_decode('conforme al Arto. 16 de la ley Monetaria.'),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(158, 170);
  $this->MultiCell(12,3,utf8_decode('Mora: '),0,'L');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(168, 170);
  $this->MultiCell(108,3,utf8_decode('En caso de falta de pago en la fecha indicada Incurrirá (mas) en mora'),0,'J');
  $this->SetFont('Arial','B', 9);
  $this->SetXY(158, 174);
  $this->MultiCell(118,3,utf8_decode('sin necesidad de requerimiento judicial y extrajudicial.'),0,'J');
  #$this->MultiCell(30,25,utf8_decode('$ '.$total_pago),1,'C');

    #Establecemos el margen inferior:
    #$pdf->SetAutoPageBreak(true,25);
  }
  function Footer(){
    $this->SetFont('Arial','B', 8);
  $this->SetXY(11, -15);
  $this->MultiCell(62, 5, utf8_decode('Entregue Conforme'), 0, 'C');
  $this->Line(15, 195 , 70, 195);
   $this->SetFont('Arial','B', 8);
   $this->SetXY(74,-15);
  $this->MultiCell(62, 5, utf8_decode('Recibi Conforme'), 0, 'C');
  $this->Line(77, 195 , 132, 195);

  $this->SetFont('Arial','B', 8);
$this->SetXY(159, -15);
$this->MultiCell(62, 5, utf8_decode('Entregue Conforme'), 0, 'C');
$this->Line(163, 195 , 218, 195);
 $this->SetFont('Arial','B', 8);
 $this->SetXY(222,-15);
$this->MultiCell(62, 5, utf8_decode('Recibi Conforme'), 0, 'C');
$this->Line(225, 195 , 280, 195);

  }

  }
	$currentdate1 = date("d");
	$currentdate2 = date("F");
	$currentdate3 = date("y");
		$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

  $pdf = new PDF('L', 'mm', 'A4');
  $pdf->SetFont('Arial','B',16);
  $pdf->AddPage();
  $pdf->fun();
  $pdf->Output();
	//$pdf->Output('../../facturas/'.$date.' '.$_SESSION['name'].'.pdf');
}
?>
