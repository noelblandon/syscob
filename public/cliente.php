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
   <script src="../app/model/listar_cliente.js"></script>
   <style type="text/css">

    label,h4 {
        color:black;
    }

   </style>
<?php include('partials/header-lib.php') ?>
</head>

<body>

       <!-- navbar -->
       <?php  include('partials/navbar.php');  ?>
    <!-- Page Content -->
    <div class="container-fluid" style="margin-top: 20px;">
          <div class="row">



            <div class="col-md-12">



                <div class="well">
                  <div class="panel panel-primary">

                      <div class="panel-heading">
                      <div class="row">
                      <!-- row -->
                      <div class="col-lg-4 col-sm-4 col-xs-12">
                     <div class="text-left">
                        <a class="btn btn-info" data-toggle="modal" data-target="#myModal" id="new_cliente_modal"><span class="glyphicon glyphicon-user" aria-hidden="true"><strong> Cliente</strong></span></a>
                    <!-- inicio del modal-->
                        <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" align="center"><strong>Nuevo Cliente</strong> </h4>
                                  </div>
                                  <div class="modal-body">
                                                 <form class="form-horizontal" role="form">



                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4 " for="cedula">N° de Cédula:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="###-######-####A" id="cedula" onkeypress="valid_cedula ();" maxlength="16">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="nombre">Nombre:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Nombre" id="nombre">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="apellido">Apellido:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Apellido" id="apellido">
                                                        </div>
                                                        </div>

                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="direccion">Dirección:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Direccion" id="direccion">
                                                        </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="comunidad">Barrio:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Barrio" id="barrio">
                                                        </div>

                                                        </div>
                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="comunidad">Comunidad:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Comunidad" id="comunidad">
                                                        </div>

                                                        </div>

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="celular">N° de celular:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="85555555" id="celular" maxlength="8" >
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="correo">Megas a contratar:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="1Mb" id="internet" maxlength="2" >
                                                        </div>
                                                        </div>
                                                         <div class="form-group">
                                                        <label class="control-label col-sm-4" for="correo">Pago:</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" type="text" placeholder="Pago por internet contratado" id="pago" maxlength="4" >
                                                        </div>
                                                        </div>

                                                 </form>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="setTimeout(function () {listar_cliente();},500);">Cerrar</button>
                                    <button type="button" class="btn btn-primary" id="btn_add" onclick="add_cliente ();">Guardar Cliente</button>
                                  </div>
                                </div>
                              </div>
                            </div>



                        <!-- fin del modal-->
                    </div>
                    </div>
                    <!-- fin del col 4 -->

                    <div class="col-lg-2 col-sm-2 col-xs-12">

                    </div>
                    <!-- modal new cliente -->


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
                    <!-- fin del col 4 -->
                    </div>
                    <!-- fin del row -->
                      </div>
                      <!-- panel header -->

                        <div class="panel-body">
                             <div class="row">
                                  <div class="col-md-12">



                                       <div id="tabla">

                                       </div>



                            </div>
                            <!-- col -->
                        </div>
                        <!--row -->
                        </div>
                      <!-- panel body -->

                  </div>
                  <!-- panel -->







                    <hr>


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
