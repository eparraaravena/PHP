<!DOCTYPE html>
<html lang="es">
<?php
// A continuación encontrarán algunas variables al modo en que son escritas en PHP.
// Sus contenidos son: una palabra; una frase; un valor numérico; y un arreglo simple.
$title = "PHP";
$description = "PHP es un lenguaje de código abierto, especialmente adecuado para el desarrollo web de contenido dinámico. PHP se ejecuta del lado del servidor.";
$tiempo = 10;
$partes = array("PHP","PHP+CSV","PHP+JSON","PHP+GeoJSON");
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo($title);?></title>
<meta name="robots" content="noindex">
<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/style.css" rel="stylesheet">
<?php if((basename($_SERVER['PHP_SELF']))=='php_csv.php'){?>
<style>.col-sm-6:nth-child(2n+1) {clear: both;}</style>
<?php };?>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<header>
<div class="masthead clearfix">
<div class="inner">
<h1 class="masthead-brand"><?php echo($title);?></h1>
<nav>
  <ul class="nav masthead-nav">
    <li<?php if((basename($_SERVER['PHP_SELF']))=='index.php'){?> class="active" <?php };?>><a href="index.php">PHP</a></li>
    <li<?php if((basename($_SERVER['PHP_SELF']))=='php_csv.php'){?> class="active" <?php };?>><a href="php_csv.php">CSV</a></li>
    <li<?php if((basename($_SERVER['PHP_SELF']))=='php_json.php'){?> class="active" <?php };?>><a href="php_json.php">JSON</a></li>
    <li<?php if((basename($_SERVER['PHP_SELF']))=='php_geojson.php'){?> class="active" <?php };?>><a href="php_geojson.php">GeoJSON</a></li>
  </ul>
</nav>
</div>
</div>
<h2><?php echo($description);?></h2>
</header>
