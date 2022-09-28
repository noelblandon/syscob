<?php 
header("Content-Type: application/json; charset=UTF-8");
    $data = array();
    $n = 0;
    $n1 = 0;
    $dir=opendir("../../facturas");
    while($archivo=readdir($dir)){
        $n = $n + 1;
        if ($n >= 3){
            $n1 = $n1 + 1;
            $fecha = substr($archivo, 0,10);
            $cliente = substr($archivo, 11, -4);
            $cliente = iconv("UTF-8","UTF-8//IGNORE",$cliente); 
            $value = array(
                "id" => ($n1),
                "cliente" => trim($cliente),
                "fecha" => $fecha,
                "url" => '<a href="../facturas/'.$archivo.'" target="_blank">Abrir</a>'
            ); 
            array_push($data,$value);  
        }    

    }


/*$data = array();
foreach (glob('../../facturas/*.pdf') as $index => $filename) {
 
    $new_val = str_replace('../../facturas/','',$filename);
    $new_val = str_replace('pdf','',$new_val);
    $name = substr($new_val, 11, -1);
    $date = substr($new_val, 0,10);
    
    $name = iconv("UTF-8","UTF-8//IGNORE",$name); 

    $value = array(
        "id" => ($index + 1),
        "cliente" => trim($name),
        "fecha" => $date,
        "url" => '<a href="../facturas/'echo $archivo; .'" target="_blank">Abrir</a>'
    ); 
    array_push($data,$value);    
}*/
  echo json_encode(["data" => $data]);
?>