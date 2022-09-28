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
     <!-- Favicon and touch icons -->
     <link rel="icon" href="../assets/ico/logo-new.ico">
        <!--link rel="apple-touch-icon" sizes="57x57" href="../assets/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../assets/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../assets/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../assets/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../assets/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../assets/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../assets/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../assets/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/ico/favicon-16x16.png">
        <link rel="manifest" href="../assets/ico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="../assets/ico/ms-icon-144x144.png"-->
        <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/shop-item.css" rel="stylesheet">
    <!--link rel="stylesheet" href="../assets/css/estilos.css"-->
    <style media="screen">
      .col-md-3{color: white !important;}
    </style>
      <!-- jQuery -->
   <script src="../assets/js/jquery-1.11.1.min.js"></script>
   <script src="../assets/js/notify.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- App -->
   <script src="../app/model/pagos.js"></script>
   <?php include('partials/header-lib.php') ?>
</head>
<body>

    <!-- navbar -->
     <?php  include('partials/navbar.php');  ?>
    <!-- Page Content -->
    <div class="container" style="margin-top: 20px;">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Mora</p>
                <div class="list-group">
                <div id="mora">

                </div>

                </div>
            </div>

            <div class="col-md-9">



                <div class="well">

                    <div class="text-right">
                        <div class="col-lg-6 col-sm-6 col-xs-12 pull-right">
                          <form role="form" >

                            <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                             <input type="text" class="form-control" id="buscar_clientes_pago" onkeyup="listar_pagos_like();">

                            </div>

                     </form>
                     </div>
                    </div>

                    <hr>



                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="pagos">


                            </div>
                        </div>
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
