<?php
setlocale(LC_ALL, 'es_NI');
date_default_timezone_set("America/Managua");

if(isset($_GET['fechai'],$_GET['fechaf'])){
  	session_start();
    $fechai   = $_GET['fechai'];
    $fechaf   = $_GET['fechaf'];
require_once("DBController.php");
$db_handle = new DBController();
$result = $db_handle->runQuery("SELECT * FROM venta where fechaventa between '".$fechai."' and '".$fechaf."'");
$header = array("Id", "No Recibo", "Nombre", "Fecha", "Descuento", "Total");

require '../../assets/pdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
		$pdf->Cell(30,12,$heading,1);
}
$pdf->SetXY(15, 10);
foreach($result as $row) {
	$pdf->SetFont('Arial','B',12);
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(30,8,$column,1);
}
}
$pdf->Output();
?>
