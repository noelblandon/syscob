<?php
include('partials/session.php');
   
 ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="App Web Cartera y Cobro ">
    <meta name="author" content="ElHacKer">

    <title>App Web de Cartera y Cobro</title>

    <link rel="icon" href="../assets/ico/logo-new.ico">  
    <link rel="stylesheet" href="../assets/datatable/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/datatable/css/dt.min.css">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/shop-item.css" rel="stylesheet">
   <?php include('partials/header-lib.php') ?>
</head>

<body>

    <!-- navbar -->
    <?php  include('partials/navbar.php');  ?>
    <!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

        <div class="row">



            <div class="col-md-12">



                <div class="well">

                   <div class="panel panel-primary">
                            <div class="panel-heading">

                                    <h3>Lista de facturas</h3>

                                <!-- panel heading -->
                            </div>

                            <div class="panel-body">
                            
 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th><div ><i class=" glyphicon glyphicon-eye-open "></i></div></th>
            </tr>
        </thead>
        <tbody>
        <?php

            $n = 0;
            $n1 = 0;
            $dir=opendir("../facturas");
            while($archivo=readdir($dir)){
               if($n > 2){
                echo'<tr>';
                echo'<td>'.($n+1).'</td>';
                echo'<td>'.substr($archivo, 11, -4).'</td>';
                echo'<td>'.substr($archivo, 0,10).'</td>';
                echo'<td>+</td>';
                echo'</tr>';
               }
            }   
            ?>


        </tbody>
        <tfoot>
            <tr>
                <th>N°</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th><div ><i class=" glyphicon glyphicon-eye-open "></i></div></th>
             </tr>
        </tfoot>
</table>
                            <table class="table">
                                    <div class="table-responsive">
                                    <thead>
                                    <tr>
                                        <th>n°</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th><div ><i class=" glyphicon glyphicon-eye-open "></i></div></th>
                                    </tr>
                                    </thead>
                                <?php

                                    $n = 0;
                                    $n1 = 0;
                                    $dir=opendir("../facturas");
                                    while($archivo=readdir($dir))
                                    {
                                        $n = $n + 1;


                                        if ($n >= 3){

                                            $n1 = $n1 + 1;


                                         $fecha = substr($archivo, 0,10);

                                         $cliente = substr($archivo, 11, -4);



                                ?>


                                    <tbody>
                                        <tr>
                                            <td><?php echo $n1; ?></td>
                                            <td> <label><?php echo $cliente;?></label> </td>
                                            <td><?php echo $fecha; ?></td>
                                            <td><a href="../facturas/<?php echo $archivo;?>" target="_blank">Abrir</a></td>
                                        </tr>
                                    </tbody>







                                <?php

                                    }
                                    //fin del if
                                    }
                                ?>
                            </table>


                                <!-- panel -->
                            </div>


                   <!-- panel -->
                   </div>



                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                            <p>Copyright &copy; By ElHacKer <?php echo date('Y '); ?></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

<script src="../assets/datatable/js/jquery.js"></script>
<script src="../assets/datatable/js/bootstrap.min.js"></script>
<script src="../assets/datatable/js/bdt.min.js"></script>
<script src="../assets/datatable/js/dt.min.js"></script>

<script src='partials/read-file.php'>
console.log(files);

$(document).ready(function () {
    $('#example').DataTable();
});
   </script>

</body>

</html>
