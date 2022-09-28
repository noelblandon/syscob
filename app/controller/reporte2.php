<?php
setlocale(LC_ALL, 'es_NI');
date_default_timezone_set("America/Managua");

if(isset($_GET['fechai'],$_GET['fechaf'])){
  	session_start();
    $fechai   = $_GET['fechai'];
    $fechaf   = $_GET['fechaf'];
require_once("DBController.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT idventa,Norecibo,nombrec,fechaventa,descuento,total,ganancias FROM venta where fechaventa between '".$fechai."' and '".$fechaf."'");
$header = array("Id", "No Recibo", "Nombre", "Fecha", "Descuento", "Total");

require '../../assets/pdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(10, 10);
$pdf->Cell(185,8,utf8_decode('Reporte de Venta de '.$fechai.' hasta '.$fechaf.''),0,1,'C');
//$pdf->SetXY(10, 20);
//foreach($header as $heading) {//foreach para recorrer $header array
//		$pdf->Cell(30,12,$heading,1);
//}
$pdf->SetXY(10, 20);
$pdf->Cell(15,8,utf8_decode('No'),1,1,'C');
$pdf->SetXY(25, 20);
$pdf->Cell(70,8,utf8_decode('Cliente'),1,1,'C');
$pdf->SetXY(95, 20);
$pdf->Cell(30,8,utf8_decode('Descuento'),1,1,'C');
$pdf->SetXY(125, 20);
$pdf->Cell(30,8,utf8_decode('Total'),1,1,'C');
$pdf->SetXY(155, 20);
$pdf->Cell(30,8,utf8_decode('Ganancias'),1,1,'C');


$amount = 0;
$total = 0;
$gana = 0;
$cont=1;
$pdf->SetXY(15, 20);
foreach($result as $row) {
  $amount += $row['descuento'];
  $total += $row['total'];
  $gana += $row['ganancias'];
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln();
  $pdf->Cell(15,8,$cont++,1,0,'C');
  $pdf->Cell(70,8,$row['nombrec'],1,0,'L');
  $pdf->Cell(30,8,$row['descuento'],1,0,'C');
  $pdf->Cell(30,8,$row['total'],1,0,'C');
  $pdf->Cell(30,8,$row['ganancias'],1,0,'C');
	//foreach($row as $column)
		//$pdf->Cell(30,8,$column['idventa'],1);

}
$pdf->Ln();
$pdf->Ln();
$pdf->SetX(95);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,8,utf8_decode('Descuento'),1,0,'C');
$pdf->SetX(125);
$pdf->Cell(30,8,utf8_decode('Total'),1,0,'C');
$pdf->SetX(155);
$pdf->Cell(30,8,utf8_decode('Ganancias'),1,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetX(95);
$pdf->Cell(30,8,$amount,1,0,'C');
$pdf->SetX(125);
$pdf->Cell(30,8,$total,1,0,'C');
$pdf->SetX(155);
$pdf->Cell(30,8,$gana,1,1,'C');
}
$pdf->Output();
?>
