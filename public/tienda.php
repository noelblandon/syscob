<?php

date_default_timezone_set("America/Managua");
        session_start();
        if ($_SESSION['id_usuario'] == 0){
            header('location: ../index.php');
        }
        if (!isset($_SESSION['id_usuario'],$_SESSION['casa_user'],$_SESSION['rol_user'])){
         $_SESSION['id_usuario'] = 0; $_SESSION['casa_user'] = 0; $_SESSION['rol_user'] = 0;
         header('location: ../index.php');
        }
 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="App Web Cartera y Cobro ">
     <title>App Web de Cartera y Cobro</title>

      <!-- Favicon and touch icons -->
         <link rel="apple-touch-icon" sizes="57x57" href="../assets/ico/apple-icon-57x57.png">
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
         <meta name="msapplication-TileImage" content="../assets/ico/ms-icon-144x144.png">
         <meta name="theme-color" content="#ffffff">
         <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
         <!-- Bootstrap Core CSS-->
         <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
         <!-- Custom CSS -->
         <link href="../assets/bootstrap/css/shop-item.css" rel="stylesheet">
         <link rel="stylesheet" href="../assets/css/estilos.css">
         <link rel="stylesheet" href="../assets/css/tienda.css">

         <!-- jQuery -->

      <script src="../assets/js/jquery-1.11.1.min.js"></script>

      <script src="../assets/js/notify.min.js"></script>
      <script src="../app/model/ajax.js"></script>
      <script src="../assets/js/append.js"></script>
       <script src="../app/model/comprobar.js"></script>


       <!-- Bootstrap Core JavaScript-->
      <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

   </head>
   <body>
     <!-- Navigation -->
     <nav class="navbar navbar-inverse navbar-fixed-top  " role="navigation">
         <div class="container">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                <a class="navbar-brand" href="index.php"><img src="../assets/img/fondo.png" style="margin-top:-14px;" width="70" height="50"></a>
             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

               <ul class="nav navbar-nav navbar-right">
                                      <li class="dropdown">
                                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ><?php echo $_SESSION['name_usuario']; ?> </a>
                                     </li>
                                     <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ><i class="fa fa-gear fa-fw"></i> Ajustes  <i class="fa fa-caret-down"></i></a>
                                                 <ul class="dropdown-menu">
                                                     <li><a href="config.php"><i class="fa fa-fw fa-user"></i>Perfil</a></li>
                                                     <li><a href="../app/controller/logout.php">Salir</a></li>
                                                 </ul>
                                     </li>
                         </ul>

                 <ul class="nav navbar-nav ">

                     <li >
                         <a href="facturas.php" >Facturas</a>
                     </li>
                     <?php if ($_SESSION['rol_user'] == 1) {
                                 echo' <li>
                                  <a href="cliente.php" >Clientes</a>
                                   </li>
                                    <li>
                         <a href="reportes.php" >Reportes</a>
                     </li>
                     <li >
                         <a href="user.php" >Usuarios</a>
                     </li>
                     <li >
                         <a href="contratos.php" >Contratos</a>
                     </li>';

                               }

                    ?> <li > <a >Fecha: <?php  $date = date('d-m-Y'); $date =
                    strtotime("-0 days",strtotime($date) );$date =
                    date('d-m-Y',($date)); echo $date; ?></a>
                    </li>
                    <li class="active"> <a href="tienda.php" >Tienda</a>
                    </li>

                 </ul>
             </div>
             <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
     </nav>
     <div class="contenedor">
       <div class="aside">
         <ul class="list">
           <li class="inventario">Inventario</li>
           <li class="venta">Venta</li>
           <li class="compra">Compra</li>
           <li class="proveedor">Proveedor</li>
           <li class="cliente">Cliente</li>
           <li class="vfact">Ver Facturas</li>
           <li class="catalogo" style="display:none">Catálogo</li>
           <li class="reportes" >Reportes</li>
         </ul>
       </div>
       <label id="control" style="display:none"><?php echo $_SESSION['id_usuario']; ?></label>
       <div class="contenido">

       </div>
     </div>
     <script src="../assets/js/append.js"></script>
     <script src="../app/model/ajax.js"></script>
      <script src="../app/model/comprobar.js"></script>
   </body>
 </html>
