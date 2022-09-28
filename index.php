<?php
session_start();

 if (isset($_SESSION['id_usuario']) && $_SESSION['id_usuario'] > 0){
     header('location: public/index.php');
  }

 ?>
 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Syscob</title>
     <link rel="icon" href="assets/ico/logo-new.ico">
     <!--link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-icon-57x57.png">
     <link rel="apple-touch-icon" sizes="60x60" href="assets/ico/apple-icon-60x60.png">
     <link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-icon-72x72.png">
     <link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-icon-76x76.png">
     <link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-icon-114x114.png">
     <link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-icon-120x120.png">
     <link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-icon-144x144.png">
     <link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-icon-152x152.png">
     <link rel="apple-touch-icon" sizes="180x180" href="assets/ico/apple-icon-180x180.png">
     <link rel="icon" type="image/png" sizes="192x192"  href="assets/ico/android-icon-192x192.png">
     <link rel="icon" type="image/png" sizes="32x32" href="assets/ico/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="96x96" href="assets/ico/favicon-96x96.png">
     <link rel="icon" type="image/png" sizes="16x16" href="assets/ico/favicon-16x16.png">
     <link rel="manifest" href="assets/ico/manifest.json">
     <meta name="msapplication-TileColor" content="#ffffff">
     <meta name="msapplication-TileImage" content="assets/ico/ms-icon-144x144.png"-->
     <meta name="theme-color" content="#ffffff">
     <link rel="stylesheet" href="assets/css/estilos.css">
     <script src="assets/js/jquery-1.11.1.min.js"></script>
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/js/jquery.backstretch.min.js"></script>
     <script src="assets/js/scripts.js"></script>
     <script src="assets/js/notify.min.js"></script>
     <script src="app/model/login.js"></script>
   </head>
   <body>
     <div class="inner-bg">
         <div class="contain">
           <div class="imge">
             <img src="assets/img/user.png" alt="none" width="133" height="133">
           </div>
                   <div class="form-bo" >
                     <div class="tit">
                       <label for="">Iniciar Sesión</label>
                     </div>
                       <div class="form-bottom">
                     <form role="form"  class="login-form" >
                       <div class="form-group1">
                         <div class="imgu">
                           <img src="assets/img/usuario.png" alt="none" width="28" height="40">
                         </div>
                           <input type="text" name="form-username" placeholder="Usuario..." class="form-username form-control" id="form-username" >
                         </div>
                         <div class="form-group2">
                           <div class="imgp">
                             <img src="assets/img/contra.png" alt="none" width="28" height="40">
                           </div>
                           <input type="password" name="form-password" placeholder="Contraseña..." class="form-password form-control" id="form-password" >
                         </div>
                         <div class="bt">
                           <button type="button" class="btn" id="btn-login">Registrarse</button>
                         </div>
                     </form>
                 <div id="msg"></div>
                 </div>
             </div>
         </div>
     </div>
   </body>
 </html>
