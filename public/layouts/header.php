<?php
 include('partials/session.php');
 if ($_SESSION['rol_user'] != 1) { header('location: ../index.php'); }
 $url_main = "/syscob_master"
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
<style type="text/css">
label,h4 {
    color:black;
}

   </style>