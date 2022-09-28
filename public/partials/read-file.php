<?php 
header("Content-Type: application/json;");
$out = array();

foreach (glob('../../facturas/*.pdf') as $index => $filename) {
 
    $new_val = str_replace('../../facturas/','',$filename);
    $new_val = str_replace('pdf','',$new_val);
    $name = substr($new_val, 11, -1);
    $date = substr($new_val, 0,10);
    array_push($out,array('name'=>$name,'date'=>$date));
   
   /* $p = pathinfo($filename);

    $name = substr($p['filename'], 11, -4);
    $date = substr($p['filename'], 0,10);
    $out[$index] = json_encode(['name' => $name, 'date'=>$date]);*/
}
$data =['data' => $out];
echo json_encode(["data" => [ ["name" => "noel", "date" => "blas"  ]]]);
?>