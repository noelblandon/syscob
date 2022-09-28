<?php 
session_start();
       

        if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] > 0) 
        {
         
         header('location: public/index.php');
        }
          


 ?>

<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web App - El gato</title>

        <!-- CSS -->
     
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/ico/favicon-16x16.png">
        <link rel="manifest" href="assets/ico/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/ico/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/notify.min.js"></script>        
        <script src="app/model/login.js"></script>

        <style type="text/css">
            
background: rgba(147,206,222,1);
background: -moz-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(147,206,222,1)), color-stop(41%, rgba(117,189,209,1)), color-stop(100%, rgba(73,165,191,1)));
background: -webkit-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: -o-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: -ms-linear-gradient(left, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: linear-gradient(to right, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cede', endColorstr='#49a5bf', GradientType=1 );
        </style>

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                  
                    
                        	<div class="row">
                            <div class="col-lg-4 col-sm-2 col-xs-0"></div>
                            <div class="col-lg-4 col-sm-8 col-xs-12">
                        	<div class="form-box" >
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Iniciar Sesion</h3>
	                            		
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form"  class="login-form" >
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Nombre de Usuario</label>
				                        	<input type="text" name="form-username" placeholder="Usuario..." class="form-username form-control" id="form-username" >
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Contraseña</label>
				                        	<input type="password" name="form-password" placeholder="Contraseña..." class="form-password form-control" id="form-password" >
				                        </div>
				                        <button type="button" class="btn" id="btn-login">Registrarse</button>
				                    </form>
			                  <div id="msg"></div>
		                
		                	
	                        
                        </div>
                        
                        
                        	
                        
                    </div>
                    </div> <!-- col -->
                    <div class="col-lg-4 col-sm-2 col-xs-0"></div>
                    </div> <!-- row -->

                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made By <strong>El HacKer</strong></a> 
        					Make a new day <i class="fa fa-eye"></i></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>