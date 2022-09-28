<?php 

date_default_timezone_set("America/Managua");
if (isset($_GET['id'])) {
	$id = $_GET['id'];


require '../../assets/pdf/fpdf.php';

require '../../config_db/config.php';
require 'num_let.php';

$crud->contrato($id);

class PDF extends FPDF
{
	
	
	function Header()
	{
	



 

	}

	function Datos()


	{	




			//cabecera del pdf
		//logo
		//$this->Image('../../assets/img/logo.png',0,5,30);
		//fuente
		$this->SetFont('Arial','B',10);
		//movernos a la derecha 
		//Imagen izquierda
$this->Image('../../assets/img/fondo.png', 20, 12, 40, 40, 'PNG');
 
//Texto de Título
$this->SetFont('Courier','BI',16);
$this->SetXY(50, 30);
$this->MultiCell(70, 5, utf8_decode('CSI Jacvideo'), 0, 'C');
$this->SetFont('Courier','BI',14);
$this->SetXY(42, 37);
$this->MultiCell(160, 5, utf8_decode('Necesita Resultados, Tenemos Soluciones.'), 0, 'C');
 

		
		$this->SetFont('Courier','BI', 14);
		$this->SetXY(35, 46);
		$this->MultiCell(170,20,utf8_decode('Contrato de Servicios Internet Inalámbrico.'),0,'C');

		                           
								  
								
								
		
		 


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




	
	$this->SetFont('Courier','', 9.5);	
		$this->SetXY(20, 63);
	$this->MultiCell(170,5,utf8_decode('Nosotros José Andrés Carrasco Torres mayor de edad, Soltero, ingeniero en Sistemas de información, Master en Telemática, de nacionalidad nicaragüense y de este domicilio, con cedula de identidad numero 161-210885-002N, quien actúa en calidad de gerente propietario de Centro de Soluciones Informáticas Jacvideo, quien en lo sucesivo se llamara CSIJ y el Sr(a). '.$_SESSION['cliente']['nombre'].' con cedula de identidad número '.$_SESSION['cliente']['cedula'].', mayor de edad, y de este domicilio, que en lo sucesivo se le llamara cliente, convienen que CSIJ brindara al cliente el servicio de Internet Inalámbrico, que en lo sucesivo se llamara servicio, conforme a las condiciones establecidas en el presente contrato.'),0,'J');


/*fin de la presentacion*/


		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 115);
		$this->MultiCell(170,3,utf8_decode('Del Servicio'),0,'L');

		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 119);
		$this->MultiCell(170,3,utf8_decode('CSIJ proporcionara servicio de Internet con tecnología Inalámbrica en la frecuencia de 5.8 ghz. Es de mutuo consentimiento que cuando el SERVICIO se interrumpa debido a razones de fuerza mayor, caso fortuito o causas fuera del control de CSIJ, este no es responsable, ni puede ser objeto de reclamos por incumplimiento, deficiencias o interrupciones del SERVICIO, liberando a CSIJ de cualquier daño o perjuicio que el cliente pudiese experimentar.'),0,'J');
	/*fin del servicio*/



		$num=$_SESSION['cliente']['pago']; 
        $c = new EnLetras(); 
        $let = strtoupper( $c->ValorEnLetras($num,"dólares ")); 

		$this->SetFont('Courier','B', 8);	  
		$this->SetXY(20, 136);
		$this->MultiCell(170,3,utf8_decode('De las Tarifas '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 140);
		$this->MultiCell(170,3,utf8_decode('El cliente pagará a CSIJ una cuota fija mensual de $ '.$_SESSION['cliente']['pago'].' ( '.$let.' estadounidenses) a partir del día '.$fecha.', por tanto su fecha de pago para sus facturas posteriores será el día 15 de cada mes. Las tarifas no podrán ser modificadas por CSIJ mientras el presente contrato este en vigencia.'),0,'J');	
/*fin de las tarifas*/


		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 154);
		$this->MultiCell(170,3,utf8_decode('Del Plazo '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 158);
		$this->MultiCell(170,3,utf8_decode('Este contrato tendrá una vigencia mínima de 5 (cinco) meses contados a la instalación del servicio día '.$fecha.', o hasta que el cliente así lo considere, pudiente este (El Cliente seguir con el servicio sin necesidad de renovar contrato hasta que el cliente así lo considere).'),0,'J');

/*fin del plazo*/



		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 170);
		$this->MultiCell(170,3,utf8_decode('De la facturación '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 174);
		$this->MultiCell(170,3,utf8_decode('Para el establecimiento del monto que el CLIENTE debe pagar o cancelar, CSIJ enviara mensualmente su estado de cuenta para el pago en la oficina de CSIJ, en donde se le anexara su factura como respaldo al pago efectuado. Cuando el pago sea hecho con cheques sin fondos suficientes o dichos cheques fueran rechazados, El CLIENTE se obliga a pagar en efectivo el valor de lo adeudado, mas el ajuste de mantenimiento al valor del cheque desde la fecha en que fue recibido por CSIJ hasta su efectivo pago, adicionalmente el CLIENTE asumirá los cargos que la entidad bancaria cobre por la emisión de cheques sin fondos, mas un cargo de $ 10.00 (Diez Dólares estadounidenses) en concepto de gastos administrativos en los que incurrirá CSIJ.'),0,'J');
/*fin de la facturacion*/

		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 200);
		$this->MultiCell(170,3,utf8_decode('Equipamiento propio de CSIJ '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 204);
		$this->MultiCell(170,3,utf8_decode('Equipamientos de antenas, routers, cable y equipos adicionales para la entrega del servicio de internet son y seguirán siendo propiedad de CSIJ, Aun una vez finalizado el contrato con el cliente. CSIJ se reserva el derecho de retirar los equipos una vez concluido la relación con el CLIENTE.'),0,'J');		
/*fin del equipamiento*/



		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 218);
		$this->MultiCell(170,3,utf8_decode('De la suspensión del servicio '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 220);
		$this->MultiCell(170,3,utf8_decode('
		A.	Si el CLIENTE incumple los términos y condiciones del presente contrato.
		B.	Si el uso que hace el CLIENTE del SERVICIO, objeto de este contrato, pone en peligro la seguridad de las personas o propiedades, o   la utiliza para fines delictivos o ilícitos.
		C.	Si el CLIENTE cae en mora por 2 meses, se le suspenderá el SERVICIO inmediatamente. Si en el transcurso de 15 días después de la suspensión del SERVICIO el CLIENTE no se pone al día en sus pagos, CSIJ Retirara los equipos instalados. 
		'),0,'J');	

/*fin de la suspencion del servicio*/

		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 306);
		$this->MultiCell(170,3,utf8_decode('De las responsabilidades del uso del servicio.'),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 12);
		$this->MultiCell(170,3,utf8_decode('
		A.	El CLIENTE es el único responsable por el uso que se le de a el SERVICIO.
		B.	El CLIENTE se compromete ha hacer uso del SERVICIO, únicamente para fines lícitos y a no usarlos para los fines que no sean los contratados, de manera que acepta que el presente contrato no le autoriza la venta, alquiler y/o subarriendo del SERVICIO a terceros u otra modalidad cualquiera que estas sean.
		C.	El CLIENTE asume la responsabilidad por el uso del SERVICIO que realicen otras personas autorizadas por el, así como por el uso indebido e ilícito que le dan al servicio, por quienes deberá responder de conformidad a la ley, eximiendo desde ya a CSIJ ante los reclamos de terceros por la infracción y violación de esta disposición.
		D.	CSIJ no toma responsabilidad por perdida de información, daños a equipos ocasionados por los usuarios, virus y otras instancias que pudiesen resultar del uso del SERVICIO.
'),0,'J');
/*fin de las responsibilidades*/

		$this->SetFont('Courier','', 10);	
		$this->SetXY(20, 70);
		$this->MultiCell(170,5,utf8_decode('ASÍ LO EXPRESAMOS Y LO ACORDAMOS LOS CONTRATANTES Y DE CONFORMIDAD FIRMAMOS DOS TANTOS DE UN MISMO TENOR DE DOS HOJAS QUE CONTIENE EL PRESENTE CONTRATO EN LA CIUDAD DE ESTELÍ, DEPARTAMENTO DE ESTELÍ A LOS '.$date.' DÍAS DEL MES DE '.$fecha_c.'.'),0,'J');
	
/**/

		
	
		
		$this->SetFont('Courier','', 8);
		$this->SetXY(15, 140);
		$this->MultiCell(100, 5, utf8_decode('CSI'), 0, 'C');
		$this->Line(35, 140 , 95,140);
		
		$this->SetFont('Courier','', 8);
		$this->SetXY(120,140);
		$this->MultiCell(50, 5, utf8_decode('CLIENTE'), 0, 'C');
		$this->Line(114, 140 , 178,140);
        


        $this->SetXY(98,145);
		$this->MultiCell(100, 5, utf8_decode($_SESSION['cliente']['nombre']), 0, 'C');


	
		$this->SetXY(120,150);
		$this->MultiCell(50, 5, utf8_decode($_SESSION['cliente']['cedula'] ), 0, 'C');
		
		
	
	}
	function Footer()
	{
	   
	}

	





}
			
		 $date = date('U', strtotime($_SESSION['cliente']['fecha']));
					$fecha2 = date('m',($date));
					$fecha3 = date('Y',($date));
					$date = date('d',($date));
					$fecha =  $date.'-'.$fecha2.'-'.$fecha3;




			$pdf = new PDF('P','mm','Letter');
			$pdf->SetFont('Arial',10);
			$pdf->AddPage();
			$pdf->Datos();
			$pdf->Output();
			$pdf->Output('../../contratos/'.$fecha.' '.$_SESSION['cliente']['nombre'].'.pdf');

			
			




}

 ?>