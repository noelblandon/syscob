<?php
   header("Content-Type: application/json; charset=UTF-8");

   set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
    if (error_reporting() == 0) {
      return;
    }
    if (error_reporting() & $severity) {
      throw new ErrorException($message, 0, $severity, $filename, $lineno);
    }
}
include('../config/Database.php');



if(isset($_POST) && isset($_POST["method"]) && $_POST["method"] == "create"){
 
    try{       
        $date   = date('U');
        $date2  = strtotime ( '-0 days' , ( $date ));
        $fecha   = date('d-m-Y');
				$fecha1  = strtotime ( '+1 month' , strtotime ( $fecha ));
						

        $cliente ="INSERT INTO clientes (`n_cedula`, `nombres`, `apellidos`, `direccion`, `barrio`, `comunidad`,  `celular`,`fecha_contrato`, `pago`, `internet_contratado`, `id_casa_matriz`,  `estado`) VALUES ";
        $cliente .="('".$_POST['cedula']."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['direccion']."','".$_POST['barrio']."','".$_POST['comunidad']."','".$_POST['celular']."','".$date2."','".$_POST['pago']."','".$_POST['internet']."','2','1');"; 
        $clienteRegistrado = (new Database())->insertData($cliente);

        $pago ="INSERT INTO detalles_pago (`id_cliente`, `fecha_pago`, `internet`, `pago`,`estado`) VALUES ";
        $pago .="('".$_POST['cedula']."','".$fecha1."','".$_POST['internet']."', '".$_POST['pago']."', '0' );";
        $pagoRegistrado = (new Database())->insertData($pago);
        if($clienteRegistrado[0] && $pagoRegistrado[0]){
            http_response_code(200);
            echo json_encode(["status" => 200 ,"msg" => "Registro Guardado Exitosamente"]);
            exit;
          }else{
            if($clienteRegistrado[0] == false){
              throw new Exception($clienteRegistrado[1]);
            }else{
              throw new Exception($pagoRegistrado[1]);
            }
            
          }        
    }catch(Exception $e){
        http_response_code(500);
        echo json_encode(["status" => 500 ,"msg" => $e->getMessage() ]);
        exit;
    } 
}

if(isset($_POST) && isset($_POST["method"]) && $_POST["method"] == "update"){
 
  try{       
      $getCliente = "SELECT  pago,internet_contratado as mb  FROM clientes  WHERE  n_cedula ='".$_GET['cedula']."' ;";
      $query = (new Database())->getData($getCliente);
      $oldpago = 0;
      $oldmb = 0;
      while($r = $query->fetch_array()){
        $oldpago = $r['pago'];
        $oldmb = $r['mb'];
      } 
      $updateCliente = "";
      if($oldpago != $_POST['pago'] || $oldmb != $_POST['internet']){
        $fecha   = date('U');
					$fecha1  = strtotime ( '-0 days' , ( $fecha ));
					$fecha2  = $fecha1;
          $updateCliente = "UPDATE clientes SET nombres ='".$_POST['nombre']."',  apellidos ='".$_POST['apellido']."', direccion ='".$_POST['direccion']."',";
          $updateCliente .= "barrio ='".$_POST['barrio']."', comunidad ='".$_POST['comunidad']."',  celular ='".$_POST['celular']."', internet_contratado ='".$_POST['internet']."', pago ='".$_POST['pago']."',fecha_contrato='".$fecha2."' WHERE  n_cedula ='".$_GET['cedula']."'  ;";
      }else{
         $updateCliente = "UPDATE clientes SET nombres ='".$_POST['nombre']."',  apellidos ='".$_POST['apellido']."', direccion ='".$_POST['direccion']."',";
         $updateCliente .= "barrio ='".$_POST['barrio']."', comunidad ='".$_POST['comunidad']."',  celular ='".$_POST['celular']."', internet_contratado ='".$_POST['internet']."', pago ='".$_POST['pago']."' WHERE  n_cedula ='".$_GET['cedula']."'  ;";
       }
							
      $updatepago = "UPDATE detalles_pago SET internet='".$_POST['internet']."',pago='".$_POST['pago']."' WHERE  estado='0' AND  id_cliente ='".$_GET['cedula']."';";
      $clienteActualizado = (new Database())->updateData($updateCliente);
      $pagoActualizado = (new Database())->updateData($updatepago);
      if($clienteActualizado[0] && $pagoActualizado[0]){
          http_response_code(200);
          echo json_encode(["status" => 200 ,"msg" => "Registro Actualizado Exitosamente"]);
          exit;
        }else{
          if($clienteActualizado[0] == false){
            throw new Exception($clienteActualizado[1]);
          }else{
            throw new Exception($pagoActualizado[1]);
          }
          
        } 
  }catch(Exception $e){
      http_response_code(500);
      echo json_encode(["status" => 500 ,"msg" => $e->getMessage() ]);
      exit;
  } 
}

if(isset($_POST) && isset($_POST["accion"]) && $_POST["accion"] == "estado"){
 
  try{       
      $estado = ($_POST['method'] == "baja")?0:1;      
      $updateCliente = "UPDATE clientes SET estado ='".$estado."' WHERE  n_cedula ='".$_GET['cedula']."';";
      $clienteActualizado = (new Database())->updateData($updateCliente);
      if($clienteActualizado[0]){
          http_response_code(200);
          echo json_encode(["status" => 200 ,"msg" => "Registro Actualizado Exitosamente"]);
          exit;
        }else{
         throw new Exception($clienteActualizado[1]);
        } 
  }catch(Exception $e){
      http_response_code(500);
      echo json_encode(["status" => 500 ,"msg" => $e->getMessage() ]);
      exit;
  } 
}

?>