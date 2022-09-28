<?php
  include('partials/session.php');
  if ($_SESSION['rol_user'] != 1) {
   	header('location: ../index.php');
  }
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
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/shop-item.css" rel="stylesheet">

      <!-- jQuery -->
   <script src="../assets/js/jquery-1.11.1.min.js"></script>
   <script src="../assets/js/notify.min.js"></script>
   <script src="../assets/js/caja.js"></script>
    <script src="../assets/print/jquery-printme.js"></script>

    <!-- Bootstrap Core JavaScript -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- App -->
   <script src="../app/model/listar_cliente.js"></script>
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
                      <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="text-left">

                        <button class='btn btn-success' id='imprimir' type='submit'><i class="glyphicon glyphicon-print"></i></button>
                          <a class='btn btn-danger' href="../app/controller/respaldo2.php" ><i class="glyphicon glyphicon-download"></i></a>

                    </div>
                    <!-- fin del col -->
                    </div>
                    <div class="col-lg-2 col-sm-2 col-xs-12">
                    <br>
                    <!-- fin del col -->
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12 pull-right">
                    <div class="text-right">
                            <form role="form" >

                            <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>

                             <select class="form-control" id="anio"  onchange="reportes_cliente();" ><!-- onchange="reportes_cliente();reportes_cliente_excel();" -->
                                 <option value="0">Seleccione el año</option>
                                 <option value="2016" >2016 </option>
                                 <option value="2017">2017</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021">2021</option>
                                 <option value="2022">2022</option>
                                 <option value="2023">2023</option>
                                 <option value="2024">2024</option>
                                 <option value="2025">2025</option>
                                 <option value="2026">2026</option>

                             </select>

                            </div>

                            </form>
                    </div>
                    <!-- fin del col -->
                    </div>
                    <!-- row -->
                    </div>
                      <!-- panel heading -->
                    </div>
                    <div class="panel-body">

                       <hr>

                    <div class="row">
                        <div class="col-md-12">



                                       <div id="reportes">

                                       </div>
                                   <br>





                            </div>
                            <!-- fin del row -->
                        </div>

                      <!-- panell body -->
                    </div>


                  <!-- panel -->
                </div>


                    </div>

                    <hr>



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
                    <p>Copyright &copy; By ElHacKer <?php echo date('Y'); ?></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->



</body>

</html>
