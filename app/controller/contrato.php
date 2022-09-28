
<?php
setlocale(LC_ALL, 'es_NI');
date_default_timezone_set("America/Managua");
if (isset($_GET['id'])) {
	$id = $_GET['id'];


require '../../assets/pdf/fpdf.php';
#require 'fpdf.php';

require '../../config_db/config.php';
require 'num_let.php';

$crud->contrato($id);

class PDF extends FPDF{
	
function Header()	{}
	function Datos(){
		$date = date('U', strtotime($_SESSION['cliente']['fecha']));
					$fecha2 = date('m',($date));
					$fecha3 = date('Y',($date));
					$date = date('d',($date));
					$fecha =  $date.'/'.$fecha2.'/'.$fecha3;
								switch($fecha2){
									case 0: $fecha2 = "DICIEMBRE"; ;break;
									case 1: $fecha2  = "ENERO"; ;break;
									case 2: $fecha2  = "FEBRERO"; ;break;
								    case 3: $fecha2  = "MARZO"; ;break;
									case 4: $fecha2  = "ABRIL"; ;break;
									case 5: $fecha2  = "MAYO"; ;break;
								  	case 6: $fecha2  = "JUNIO"; ;break;
								  	case 7: $fecha2  = "JULIO"; ;break;
									case 8: $fecha2  = "AGOSTO"; ;break;
								    case 9: $fecha2  = "SEPTIEMBRE"; ;break;
									case 10: $fecha2 = "OCTUBRE"; ;break;
									case 11: $fecha2 = "NOVIEMBRE"; ;break;
								  	case 12: $fecha2 = "DICIEMBRE"; ;break;
										}
								$fecha_c  = $fecha2.' DEL AÑO '.$fecha3;
		#$this->Line(105, 0, 105, 209); //Vertical
		$this->SetFont('Arial','B',10);
#$this->Image('logo.png', 85, 12, 40, 40, 'PNG');
$this->Image('../../assets/img/logo-new.png', 85, 30, 50, 45, 'PNG');
$this->SetFont('Arial','B',16);
$this->SetXY(0, 85);
$this->MultiCell(210, 5, utf8_decode('Centro de Soluciones Informáticas JACVIDEO'), 0, 'C');
$this->SetFont('Arial','B',16);
$this->SetXY(0, 96);
$this->MultiCell(210, 5, utf8_decode('Contrato De Servicios Internet Inalámbrico'), 0, 'C');

$this->SetFont('Arial','B', 11);
	$this->SetXY(20, 106);
$this->MultiCell(170,5,utf8_decode('Yo José Andrés Carrasco Torres, mayor de edad, soltero, de nacionalidad nicaragüense y de domicilio en la ciudad de Estelí, con cedula de identidad número 161-210885-0002N, Ingeniero en sistemas de la información y Master en Telemática, quien actuó en calidad de Gerente, Propietario de Centro de Soluciones Informáticas JACVIDEO quien en lo sucesivo se llamará CSIJ; y el Sr(a). '.$_SESSION['cliente']['nombre'].', mayor de edad, de nacionalidad nicaragüense de domicilio en la ciudad de Estelí, con cédula de identidad número '.$_SESSION['cliente']['cedula'].', que posteriormente se llamara cliente. Conviene que CSIJ brindara el servicio de internet inalámbrico conforme a las cláusulas establecidas en el presente contrato.'),0,'J');

$this->SetFont('Arial','B', 12);
$this->SetXY(20, 155);
$this->MultiCell(170,3,utf8_decode('PRIMERA: SERVICIO'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 160.5);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 160.5);
$this->MultiCell(157,5,utf8_decode('CSIJ proporcionara servicio de internet de '.$_SESSION['cliente']['mb'].'MB con tecnología Inalámbrica en la frecuencia de 5.8Ghz.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 170.5);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 170.5);
$this->MultiCell(157,5,utf8_decode('Es de mutuo consentimiento que cuando el SERVICIO sea interrumpido por razones de fuerza mayor, caso fortuito o causas fuera de control de CSIJ, este NO ES RESPONSABLE, ni puede ser objeto de reclamos por incumplimiento, deficiencias o interrupciones del SERVICIO, liberando a CSIJ de cualquier daño o perjuicio que el cliente pudiera experimentar.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 195.5);
$this->MultiCell(10,5,utf8_decode('C.'),0,'L');
$this->SetFont('Arial','B', 11);
$this->SetXY(33, 195.5);
$this->MultiCell(157,5,utf8_decode('En caso de asistencia técnica solicitada por el cliente debido a negligencias por parte de este, razones de fuerza mayor, caso fortuito o causas fuera de control de CSIJ, se hará un recargo según la magnitud de esta.'),0,'J');
$this->SetFont('Arial','B', 12);
$this->SetXY(20, 213.5);
$this->MultiCell(170,5,utf8_decode('SEGUNDA: LAS TARIFAS'),0,'L');
$num=$_SESSION['cliente']['pago'];
        $c = new EnLetras();
        $let = strtoupper( $c->ValorEnLetras($num,"dólares "));
$this->SetFont('Arial','B', 11);
$this->SetXY(25, 220);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 220);
$this->MultiCell(157,5,utf8_decode('El cliente pagará a CSIJ una cuota fija mensual de U$'.$_SESSION['cliente']['pago'].' ( '.$let.' estadounidenses), a partir del primero de cada mes, por tanto, dichas facturas se generarán, el primero de cada mes teniendo un lapso para pagar de quince días.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 240);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 240);
$this->MultiCell(157,5,utf8_decode('Las tarifas podrán ser modificadas por CSIJ hasta la expiración del contrato presente (Seis meses después de su elaboración), el cliente estará en su derecho de cancelar el servicio una vez expirado.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 255);
$this->MultiCell(10,5,utf8_decode('C.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 255);
$this->MultiCell(157,5,utf8_decode('En caso de retraso en el pago, se hará recargo sobre la tarifa establecida según los días de demora a partir de la fecha 15 de cada mes.'),0,'J');
$this->AddPage();

$this->SetFont('Arial','B', 12);
$this->SetXY(20, 35);
$this->MultiCell(170,5,utf8_decode('TERCERA: PLAZO'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 42.5);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');
$currentdate1 = date("d");
$currentdate2 = date("F");
$currentdate3 = date("Y");
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
		$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$this->SetFont('Arial','B', 11);
$this->SetXY(33, 42.5);
$this->MultiCell(157,5,utf8_decode('Este contrato tendrá una vigencia mínima de 6 (seis) meses contados del día de la instalación del servicio, Dia '.$currentdate1.' del mes de '.str_replace($meses_EN, $meses_ES, $currentdate2).' del año '.$currentdate3.'.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 52.5);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 52.5);
$this->MultiCell(157,5,utf8_decode('Si el cliente considera la disolución del convenio deberá entregar el equipamiento propio de CSIJ utilizado en su domicilio además de saldar el mes corriente.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 62.5);
$this->MultiCell(10,5,utf8_decode('C.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 62.5);
$this->MultiCell(157,5,utf8_decode('Si el cliente desea continuar con el servicio pasado los seis meses estipulados en el contrato, este se mantendrá vigente mientras el CLIENTE posea el servicio.'),0,'J');

$this->SetFont('Arial','B', 12);
$this->SetXY(20, 75.5);
$this->MultiCell(170,5,utf8_decode('CUARTA: FACTURACIÓN'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 82.5);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 82.5);
$this->MultiCell(157,5,utf8_decode('Para el establecimiento del monto a pagar por el cliente, CSIJ enviara mensualmente su estado de cuenta (Factura) y así pueda realizar el pago en la oficina de CSIJ ubicada de Productos Briomol 1/2 cuadra al Oeste, o al agente asignado para la entrega de esta. En el momento de la cancelación de la misma se anexará su factura como respaldo del pago efectuado.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 107.5);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 107.5);
$this->MultiCell(157,5,utf8_decode('Cuando el pago sea realizado con cheque sin fondos suficientes o dichos cheques sean rechazados, EL CLIENTE se obliga a pagar en efectico el valor de lo adeudado, mas el ajuste del mantenimiento al valor del cheque desde la fecha que fue recibido por CSIJ hasta su efectivo pago. Adicionalmente el cliente asumirá los cargos de la entidad bancaria cobre por la emisión de cheques sin fondos, mas un cargo de U$10.00 (Diez Dólares Estadunidenses) en concepto de gastos administrativos en los que incurrirá CSIJ.'),0,'J');

$this->SetFont('Arial','B', 12);
$this->SetXY(20, 145.5);
$this->MultiCell(170,5,utf8_decode('QUINTA: EQUIPAMIENTO PROPIO DE CSIJ'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 152.5);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 152.5);
$this->MultiCell(157,5,utf8_decode('CSIJ instalara antenas, routers, cable y equipos adicionales para la entrega del servicio de internet inalámbrico, dichos equipos seguirán siendo de la propiedad de CSIJ, una vez finalizado CSIJ se reserva el derecho de retirar los equipos una vez concluida la relación con el cliente.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 172.5);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 172.5);
$this->MultiCell(157,5,utf8_decode('Los equipos (Router, Poe) deberán estar en un lugar apropiado y sin ningún tipo de obstrucción para un correcto funcionamiento.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 182.5);
$this->MultiCell(10,5,utf8_decode('C.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 182.5);
$this->MultiCell(157,5,utf8_decode('Al momento de retirar los equipos (En caso de no continuar con el servicio) estos deberán estar en optimas condiciones de lo contrario el cliente deberá asumir el costo del equipo.'),0,'J');

$this->SetFont('Arial','B', 12);
$this->SetXY(20, 200.5);
$this->MultiCell(170,5,utf8_decode('SEXTA: SUSPENSIÓN DEL SERVICIO'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 207.5);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 207.5);
$this->MultiCell(157,5,utf8_decode('Si el cliente incumple uno de los términos y condiciones del contrato presente.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 212.5);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 212.5);
$this->MultiCell(157,5,utf8_decode('Si el uso que hace el cliente del servicio, objeto de este contrato, pone en peligro la seguridad de las personas o propiedades, o utiliza para fines delictivos o ilícitos.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 222.5);
$this->MultiCell(10,5,utf8_decode('C.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 222.5);
$this->MultiCell(157,5,utf8_decode('Si el cliente cae en mora por dos meses, se le suspenderá el servicio inmediatamente, Si en el transcurso de 15 días después de la suspensión del servicio el cliente no se pone al día en sus pagos, CSIJ retiraran los equipos instalados. A su vez se implementará el proceso de MONITORIO del código civil, contemplado en el Arto. 526 "Solicitud del requerimiento de pago".'),0,'J');
$this->AddPage();

$this->SetFont('Arial','B', 12);
$this->SetXY(20, 35);
$this->MultiCell(170,5,utf8_decode('SEPTIMA: RESPONSABILIDADES SOBRE EL USO DEL SERVICIO'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 42.5);
$this->MultiCell(10,5,utf8_decode('A.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 42.5);
$this->MultiCell(157,5,utf8_decode('El cliente es el único responsable por el uso que se le de el servicio.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 47.5);
$this->MultiCell(10,5,utf8_decode('B.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 47.5);
$this->MultiCell(157,5,utf8_decode('El cliente se compromete a hacer uso del servicio únicamente para fines lícitos y a no usarlos para fines que no sean los contratados de manera que acepta que el presente Contrato no le autoriza a la venta, alquiler y/o sub arriendo del servicio a terceros u otra modalidad cualquiera que estas sea.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 67.5);
$this->MultiCell(10,5,utf8_decode('C.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 67.5);
$this->MultiCell(157,5,utf8_decode('El cliente asume la responsabilidad por el uso del servicio que realicen otras personas autorizadas por el, así como el uso indebido e ilícito que le dan al servicio, por quienes deberá responder de conformidad a la ley, eximiendo desde ya a Centro de Soluciones Informáticas Jacvideo (CSIJ) ante los reclamos de terceros por la infracción y violación de esta disposición.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(25, 92.5);
$this->MultiCell(10,5,utf8_decode('D.'),0,'L');

$this->SetFont('Arial','B', 11);
$this->SetXY(33, 92.5);
$this->MultiCell(157,5,utf8_decode('CSIJ no toma responsabilidad por perdida de información, daños a equipos ocasionados por los usuarios, virus y otras instancias que pudiesen resultar del uso del servicio.'),0,'J');

$this->SetFont('Arial','B', 11);
$this->SetXY(20, 130);
$this->MultiCell(170,5,utf8_decode('ASI LO EXPRESAMOS Y LO ACORDAMOS LOS CONTRATANTES Y DE CONFORMIDAD FIRMAMOS DOS TANTOS DE UN MISMO TENOR DE TRES HOJAS QUE CONTIENE EL PRESENTE CONTRATO EN LA CIUDAD DE ESTELI, NICARAGUA A LOS '.$currentdate1.' DIAS DEL MES '.str_replace($meses_EN, $meses_ES, $currentdate2).' DEL AÑO '.$currentdate3.''),0,'J');

$this->Line(20, 225, 95, 225); //H
$this->SetFont('Arial','B', 9);
$this->SetXY(20, 226);
$this->MultiCell(75,5,utf8_decode('Centro de Soluciones Informáticas JACVIDEO'),0,'C');
$this->SetFont('Arial','B', 9);
$this->SetXY(20, 231);
$this->MultiCell(75,5,utf8_decode('Gerente, Propietario.'),0,'C');
$this->Line(115, 225, 190, 225); //H
$this->SetFont('Arial','B', 9);
$this->SetXY(115, 226);
$this->MultiCell(75,5,utf8_decode('CLIENTE'),0,'C');
$this->SetFont('Arial','B', 9);
$this->SetXY(115, 231);
$this->MultiCell(75,5,utf8_decode(''.$_SESSION['cliente']['nombre'].''),0,'C');
$this->SetFont('Arial','B', 9);
$this->SetXY(115, 235);
$this->MultiCell(75,5,utf8_decode('Ced. '.$_SESSION['cliente']['cedula'].''),0,'C');

	}
	function Footer(){

	}


}
$date = date('U', strtotime($_SESSION['cliente']['fecha']));
					$fecha2 = date('m',($date));
					$fecha3 = date('Y',($date));
					$date = date('d',($date));
					$fecha =  $date.'-'.$fecha2.'-'.$fecha3;

$pdf_name = strtolower(str_replace(' ','_',$_SESSION['cliente']['nombre']));					
$pdf = new PDF('P', 'mm', 'A4');
$pdf->SetFont('Arial','B',16);
$pdf->AddPage();
$pdf->setTitle('Contratos');
$pdf->Datos();
$pdf->Output('',$pdf_name.'_contrato.pdf',true);
$pdf->Output('../../contratos/'.$fecha.' '.$_SESSION['cliente']['nombre'].'.pdf','Contrato.pdf',true);
}
 ?>
