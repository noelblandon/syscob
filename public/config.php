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
   <script src="../assets/js/caja.js"></script>
    <script src="../assets/print/jquery-printme.js"></script>

    <!-- Bootstrap Core JavaScript -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- App -->
   <script src="../app/model/config.js"></script>
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
                <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12">
                    <div class="text-left">

                        <h3>Configurar Datos</h3>
                    </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-xs-12">
                    <br>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12 pull-right">
                    <div class="text-right">

                    </div>
                    </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">

                                <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <legend style="padding-left: 15px;padding-bottom: 10px;">Cambiar nombre de usuario: </legend>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre_usr">Nombre de usuario nuevo:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="nombre de usuario" id="name_upd" style="max-width:80%;">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                       <label class="control-label col-sm-4" ></label>
                                                        <div class="col-sm-8">
                                                            <button type="button" onclick="upd_name ();" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                        </div>
                                                        <br><br>

                                                 </form>
                                <form class="form-horizontal" role="form">

                                                        <legend style="padding-left: 15px;padding-bottom: 10px;">Cambiar Contraseña: </legend>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="pass_user">Contraseña:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Contraseña" id="pass_upd"  style="max-width:80%;">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                       <label class="control-label col-sm-4" ></label>
                                                        <div class="col-sm-8">
                                                            <button type="button" onclick="upd_pass (); " class="btn btn-primary">Guardar</button>
                                                        </div>
                                                        </div>
                                                        <br><br>



                                                 </form>





                            </div>
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
