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

    <!-- Bootstrap Core JavaScript -->
   <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- App -->
   <script src="../app/model/usr.js"></script>

   <style type="text/css">

   label , h4 {color: black;}

   </style>
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
                        <a class="btn btn-info" data-toggle="modal" data-target="#myModal" id="new_cliente_modal"><span class="glyphicon glyphicon-user" aria-hidden="true"><strong> Usuario</strong></span></a>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" align="center"><strong>Nuevo Usuario</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre de Usuario:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text"  id="name_user" placeholder="Nombre de usuario ">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Contraseña :</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" id="pass_user" placeholder="Contraseña">
                                                        </div>
                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Rol:</label>
                                                        <div class="col-sm-8">
                                                           <select class="form-control" id="rol_user" >
                                                            <option value="1">Administrador</option>
                                                             <option value="2">Usuario</option>
                                                           </select>
                                                        </div>
                                                        </div>


                                                 </form>


                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function () {listar_user();},500);">Cerrar</button>
                                    <button type="button" class="btn btn-primary"  onclick="add_user ();">Guardar Usuario</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                        <!-- fin del modal-->
                    </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-xs-12">
                    <br>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-xs-12 pull-right">
                    <div class="text-right">
                     <form role="form" >

                            <div class="input-group">
                             <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                             <input type="text" class="form-control" id="buscar_clientes" onkeyup="listar_cliente_like();">

                            </div>

                     </form>
                    </div>
                    </div>
                    <!-- row -->
                    </div>
                        <!-- panel heading -->
                    </div>

                    <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">



                                       <div id="tabla">

                                       </div>



                            </div>
                            <!-- row -->
                        </div>

                        <!-- panel body -->
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
