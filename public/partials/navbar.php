<?php  
        $date = date('d-m-Y'); 
        $date = strtotime("-0 days",strtotime($date) );
        $date = date('d-m-Y',($date));  
?>                  

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top  " role="navigation" style="height: 75px;padding-top: 10px;background-color:white;border-bottom: none;">
     <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="index.php"><img src="../assets/img/logo-new.jpeg" style="margin-top:-14px;" width="70" height="50"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"> 
               <a id="date" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Fecha: <?php echo $date; ?></a>
            </li>
            <li class="dropdown">
                <a href="#" id="info" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ><?php echo $_SESSION['name_usuario']; ?> </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" id="info1" data-toggle="dropdown" role="button" aria-haspopup="true" <?php if(str_contains($_SERVER["REQUEST_URI"], 'config.php')){?>style="color: white;background: red;border-radius: 25px;" <?php } ?> ><i class="fa fa-gear fa-fw"></i> Ajustes  <i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="config.php"><i class="fa fa-fw fa-user"></i>Perfil</a></li>
                  <li><a href="../app/controller/logout.php">Salir</a></li>
                </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav ">
          <li>
              <a href="index.php" <?php if(str_contains($_SERVER["REQUEST_URI"], 'index.php')){?> class="active" <?php } ?>>Home</a>
            </li>
             
            <li>
              <a href="facturas.php" <?php if(str_contains($_SERVER["REQUEST_URI"], 'facturas.php')){?> class="active" <?php } ?>>Facturas</a>
            </li>
             
<?php   if ($_SESSION['rol_user'] == 1) { ?>
            <li>
                <a href="cliente.php"  <?php if(str_contains($_SERVER["REQUEST_URI"], 'cliente.php')){?> class="active" <?php } ?>>Clientes</a>
            </li>
            <li>
                <a href="reportes.php"  <?php if(str_contains($_SERVER["REQUEST_URI"], 'reportes.php')){?> class="active" <?php } ?> >Reportes</a>
            </li>
            <li >
                <a href="user.php"  <?php if(str_contains($_SERVER["REQUEST_URI"], 'user.php')){?> class="active" <?php } ?>>Usuarios</a>
            </li>
            <li >
                <a href="contratos.php"  <?php if(str_contains($_SERVER["REQUEST_URI"], 'contratos.php')){?> class="active" <?php } ?>>Contratos</a>
            </li>
<?php  }  ?>

           
            <li >
              <a href="tienda.php" >Tienda</a>
            </li>

            

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>