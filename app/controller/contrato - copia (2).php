<?php 

date_default_timezone_set("America/Managua");
if (isset($_GET['id'])) {
	$id = $_GET['id'];


require '../../assets/pdf/fpdf.php';


require '../../config_db/config.php';

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
$this->addFont('Arial','B',16);
$this->SetXY(50, 30);
$this->MultiCell(70, 5, utf8_decode('CSI Jacvideo'), 0, 'C');

$this->SetXY(60, 37);
$this->MultiCell(70, 5, utf8_decode('Informaticos'), 0, 'C');
 
//Texto Explicativo
$this->SetFont('Arial','B', 8);
$this->SetXY(60, 45);
$this->MultiCell(70, 5, utf8_decode('Busca Resultados, Tenemos Soluciones'), 0, 'C');
//Texto Explicativo

$this->SetXY(60, 55);
$this->MultiCell(80, 5, utf8_decode('Propietario: MSc. José Andrés Carrasco Torres'), 0, 'C');
$this->SetXY(60, 60);
$this->MultiCell(70, 5, utf8_decode('Dirección: Gobernación 1 cuadra al este 15vrs al sur Estelí, Estelí'), 0, 'C');
$this->SetXY(60, 70);
$this->MultiCell(70, 5, utf8_decode('Celular: 89268894'), 0, 'C');
$this->SetXY(60, 74);
$this->MultiCell(70, 5, utf8_decode('Correo: jacvideo2015@hotmail.com'), 0, 'C');
$fecha = date('d-m-Y');
$this->SetXY(145, 68);
$this->MultiCell(40,10,utf8_decode('      '.$fecha),1,'L');
$this->SetFont('Courier','B', 8);
$this->SetXY(145, 61);
$this->MultiCell(40,10,utf8_decode('        Fecha'),0,'L');
$this->Ln();




		$this->Ln('8');
		$this->SetFont('Courier','', 10);
		$this->SetXY(20, 90);
		$this->MultiCell(170,15,utf8_decode(''),0,'L');
		$this->SetFont('Courier','B', 14);
		$this->SetXY(22, 85);
		$this->MultiCell(170,20,utf8_decode('Contrato de Servicios Internet Inalámbrico '),0,'C');

		                           
								  
								
								
			
		$this->SetFont('Courier','', 8);
		$this->SetXY(20, 108);
		$this->MultiCell(170,70,utf8_decode(''),1,'L');
		#cedula
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 110);
		$this->MultiCell(42.5,3,utf8_decode('N° de Cedula: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(50, 110);
		$this->MultiCell(42.5,3,utf8_decode($_SESSION['cliente']['cedula'] ),0,'L');
		$this->Line(50, 113 , 87,113);
		#nombre y apellido

		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 118);
		$this->MultiCell(42.5,3,utf8_decode('Nombre y Apellido: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(60, 118);
		$this->MultiCell(170,3,utf8_decode($_SESSION['cliente']['nombre']),0,'L');
		$this->Line(60, 121 , 170,121);
		#direccion
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 125);
		$this->MultiCell(42.5,3,utf8_decode('Dirección: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(45, 125);
		$this->MultiCell(130,5,utf8_decode($_SESSION['cliente']['direccion']),0,'L');
		$this->Line(45, 129 , 170,129);
		$this->Line(45, 134 , 170,134);
		$this->Line(45, 139 , 170,139);
		
		#barrio 
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 142);
		$this->MultiCell(42.5,3,utf8_decode('Barrio: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(45, 142);
		$this->MultiCell(170,3,utf8_decode($_SESSION['cliente']['barrio']),0,'L');
		$this->Line(45, 145 , 110,145);
		#Comunidad
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 148);
		$this->MultiCell(42.5,3,utf8_decode('Comunidad: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(45, 148);
		$this->MultiCell(170,3,utf8_decode($_SESSION['cliente']['comunidad']),0,'L');
		$this->Line(45, 151 , 110,151);
		#Celular
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 154);
		$this->MultiCell(42.5,3,utf8_decode('Celular: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(45, 154);
		$this->MultiCell(50,3,utf8_decode($_SESSION['cliente']['celular'] ),0,'L');
		$this->Line(45, 157 , 70,157);
		#Fecha de COntrato
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 160);
		$this->MultiCell(42.5,3,utf8_decode('Fecha de contrato: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(60, 160);
		$this->MultiCell(170,3,utf8_decode($_SESSION['cliente']['fecha']),0,'L');
		$this->Line(60, 163 , 100,163);
		
		#MB contratados
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 166);
		$this->MultiCell(42.5,3,utf8_decode('MB Contratatos: '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(60, 166);
		$this->MultiCell(170,3,utf8_decode($_SESSION['cliente']['mb']),0,'L');
		$this->Line(60, 169 , 100,169);
		#pago
		$this->SetFont('Courier','B', 10);
		$this->SetXY(20.5, 172);
		$this->MultiCell(42.5,3,utf8_decode('Pago ($): '),0,'L');
		$this->SetFont('Courier','', 10);
		$this->SetXY(60, 172);
		$this->MultiCell(170,3,utf8_decode($_SESSION['cliente']['pago'] ),0,'L');
		$this->Line(60, 175 , 100,175);


		 


					$date = date('U', strtotime($_SESSION['cliente']['fecha']));
					$fecha2 = date('m',($date));
					$fecha3 = date('Y',($date));
					$date = date('d',($date));

												
									

								switch($fecha2){
									case 0: $fecha2 = "Diciembre"; ;break;
									case 1: $fecha2  = "Enero"; ;break;
									case 2: $fecha2  = "Febrero"; ;break;
								    case 3: $fecha2  = "Marzo"; ;break;
									case 4: $fecha2  = "Abril"; ;break;
									case 5: $fecha2  = "Mayo"; ;break;
								  	case 6: $fecha2  = "Junio"; ;break;
								  	case 7: $fecha2  = "Julio"; ;break;
									case 8: $fecha2  = "Agosto"; ;break;
								    case 9: $fecha2  = "Septiembre"; ;break;
									case 10: $fecha2 = "Octubre"; ;break;
									case 11: $fecha2 = "Noviembre"; ;break;
								  	case 12: $fecha2 = "Diciembre"; ;break;

										}
								
								$fecha  = $fecha2.' DEL AÑO '.$fecha3;	




	
	
		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 181);
		$this->MultiCell(170,3,utf8_decode('Del Servicio'),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 185);
		$this->MultiCell(170,3,utf8_decode('CSI proporcionara servicio de Internet con tecnología Inalámbrica en la frecuencia de 5.8 ghz. Es de mutuo consentimiento que cuando el SERVICIO se interrumpa debido a razones de fuerza mayor, caso fortuito o causas fuera del control de CSI, este no es responsable, ni puede ser objeto de reclamos por incumplimiento, deficiencias o interrupciones del SERVICIO, liberando a CSI de cualquier daño o perjuicio que el cliente pudiese experimentar.'),0,'J');	
		$this->SetXY(170, 210);
		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 202);
		$this->MultiCell(170,3,utf8_decode('De las Tarifas '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 205);
		$this->MultiCell(170,3,utf8_decode('El cliente pagara a CSI una cuota fija mensual de $ '.$_SESSION['cliente']['pago'].'  dólares estadounidenses a partir del día '.$_SESSION['cliente']['fecha'].' , por tanto su fecha de pago para sus facturas posteriores será el día '.$date.'  de cada mes. Las tarifas no podrán ser modificadas por CSI mientras el presente contrato este en vigencia.'),0,'J');	
		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 215);
		$this->MultiCell(170,3,utf8_decode('Del Plazo '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 218);
		$this->MultiCell(170,3,utf8_decode('Este contrato tendrá una vigencia mínima de 3 (tres) meses contados a la instalación del servicio día '.$date.', o hasta  que el cliente asi lo considere, pudiente este (El Cliente seguir con el servicio sin necesidad de renovar contrato hasta que el cliente así lo considere).'),0,'J');	
		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 228);
		$this->MultiCell(170,3,utf8_decode('De la facturación '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 231);
		$this->MultiCell(170,3,utf8_decode('Para el establecimiento del monto que el CLIENTE debe pagar o cancelar, CSI enviara mensualmente su estado de cuenta para el pago en la oficina de CSI, en donde se le anexara su factura como respaldo al pago efectuado, la factura será enviada o entregada en la dirección en donde se ha instalado el servicio. Cuando el pago sea hecho con cheques sin fondos suficientes o dichos cheques fueran rechazados, El CLIENTE se obliga a pagar en efectivo el valor de lo adeudado, mas el ajuste de mantenimiento al valor del cheque desde la fecha en que fue recibido por CSI hasta su efectivo pago, adicionalmente el CLIENTE asumirá los cargos que la entidad bancaria cobre por la emisión de cheques sin fondos, mas un cargo de $ 10.00 (Diez Dólares estadounidenses) en concepto de gastos administrativos en los que incurrirá CSI.'),0,'J');	
		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 259);
		$this->MultiCell(170,3,utf8_decode('De la suspensión del servicio '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 260);
		$this->MultiCell(170,3,utf8_decode('
		A. Si el CLIENTE incumple los términos y condiciones del presente contrato.
		B. Si el uso que hace el CLIENTE del SERVICIO, objeto de este contrato, pone en peligro la   seguridad de las personas o propiedades, o la utiliza para fines delictivos o ilícitos.'),0,'J');	
		$this->SetFont('Courier','B', 8);	
		$this->SetXY(20, 276);
		$this->MultiCell(170,3,utf8_decode('De la suspensión del servicio '),0,'L');
		$this->SetFont('Courier','', 8);	
		$this->SetXY(20, 10);
		$this->MultiCell(170,3,utf8_decode('
		A. El CLIENTE es el único responsable por el uso que se le de a el SERVICIO.
		B. El CLIENTE se compromete ha hacer uso del SERVICIO, únicamente para fines lícitos y a no usarlos para los fines que no sean los contratados, de manera que acepta que el presente contrato no le autoriza la venta, alquiler y/o subarriendo del SERVICIO a terceros u otras modalidades cualquiera que estas sean.
		C. El CLIENTE asume la responsabilidad por el uso del SERVICIO que realicen otras personas autorizadas por el, así como por el uso indebido e ilícito que le dan al servicio, por quienes deberá responder  de conformidad a la ley, eximiendo desde ya a CSI ante los reclamos de terceros por la infracción y violación de esta disposición.
		D. CSI no toma responsabilidad por perdida de información, daños a equipos ocasionados por los usuarios, virus y otras instancias que pudiesen resultar del uso del SERVICIO.'),0,'J');	
		$this->SetFont('Courier','', 10);	
		$this->SetXY(20, 70);
		$this->MultiCell(170,5,utf8_decode('ASÍ LO EXPRESAMOS Y LO ACORDAMOS LOS CONTRATANTES Y DE CONFORMIDAD FIRMAMOS DOS TANTOS DE UN MISMO TENOR DE DOS HOJAS QUE CONTIENE EL PRESENTE CONTRATO EN LA CIUDAD DE ESTELÍ, DEPARTAMENTO DE ESTELÍ A LOS '.$date.' DÍAS DEL MES DE '.$fecha.'.'),0,'L');
	


		
	
		
		$this->SetFont('Courier','', 8);
		$this->SetXY(10, 140);
		$this->MultiCell(100, 5, utf8_decode('CSI'), 0, 'C');
			$this->Line(80, 140 , 40,140);
		
		 $this->SetFont('Courier','', 8);
		$this->SetXY(120,140);
		$this->MultiCell(50, 5, utf8_decode('CLIENTE'), 0, 'C');
		$this->Line(165, 140 , 125,140);
		
		
	
	}
	function Footer()
	{
	   
	}

	





}
			
			$pdf = new PDF('P','mm','Letter');
			$pdf->SetFont('Arial',10);
			$pdf->AddPage();
			$pdf->Datos();
			$pdf->Output();

			
			




}

 ?>