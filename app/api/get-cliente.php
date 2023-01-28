<?php  

header("Content-Type: application/json; charset=UTF-8");
include('../config/Database.php');

$where = (isset($_POST['ced']))?" WHERE n_cedula= '".$_POST['ced']."' ":" " ;
$sql = "SELECT *,FROM_UNIXTIME(fecha_contrato, '%d-%m-%Y') AS contrato  FROM clientes ".$where." ORDER BY  estado desc,nombres,apellidos;";
$query = (new Database())->getData($sql);
$array = array();
$cnt = 0;
while($r = $query->fetch_array()){
  $array[$cnt]["cedula"] = $r['n_cedula'];
  $array[$cnt]["nombre"] = $r['nombres'];
  $array[$cnt]["apellido"] = $r['apellidos'];
  $array[$cnt]["direccion"] = $r['direccion'];
  $array[$cnt]["barrio"] = $r['barrio'];
  $array[$cnt]["comunidad"] = $r['comunidad'];
  $array[$cnt]["celular"] = $r['celular'];
  $array[$cnt]["fecha"] = $r['contrato'];
  $array[$cnt]["pago"] = $r['pago'];
  $array[$cnt]["mb"] = $r['internet_contratado'];
  $array[$cnt]["sucursal"] = $r['id_casa_matriz'];
  $array[$cnt]["estado"] = $r['estado'];
  $cnt++;
}

echo json_encode(['data'=>$array]);


?>