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
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/shop-item.css" rel="stylesheet">


      <!-- jQuery -->
   <script src="../assets/js/jquery-1.11.1.min.js"></script>
   <script src="../assets/js/notify.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
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

                                    <h3>Lista de contratos</h3>

                                <!-- panel heading -->
                            </div>

                            <div class="panel-body">


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
                                    $dir=opendir("../contratos");
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
                                            <td><a href="../contratos/<?php echo $archivo;?>" target="_blank">Abrir</a></td>
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



</body>

</html>
