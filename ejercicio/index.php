<!DOCTYPE html>
<html lang="es">
<?php
// A continuación encontrarán algunas variables al modo en que son escritas en PHP.
// Sus contenidos son: una palabra; una frase; un valor numérico; y un arreglo simple.
$title = "Portafolio Académico";
$description = "Cuerpo académico de la Universidad de Chile listados por facultad, instituto o áreas de investigación.";
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo($title);?></title>
<meta name="robots" content="noindex">
<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/style.css" rel="stylesheet">
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
<li<?php if((basename($_SERVER['PHP_SELF']))=='index.php'){?> class="active" <?php };?>><a href="index.php">Diseño</a></li>
</ul>
</nav>
</div>
</div>
<h2><?php echo($description);?></h2>
</header>
<section>
<?php
$datos = array_map('str_getcsv', file('portafolio-academico.csv'));
// pero debo hacer un pequeño ajuste, para eliminar del arreglo el encabezado del imdb-movies.csv
array_walk($datos, function(&$a) use ($datos) {$a = array_combine($datos[0], $a);});
array_shift($datos);
?>
<h3>Diseño</h3>
<p>Con una consulta a <a href="http://www.uchile.cl/portafolio-academico/">http://www.uchile.cl/portafolio-academico/</a> pueden aprender un poco más de los profesores en la Universidad de Chile.</p>
<p>Pueden buscar profesores por unidad académica, además de departamento o escuela; a continuación pueden ver los resultados para "FAU - Departamento de diseño" y "FAU - Escuela unificada de pregrado", traspasados a un CSV, que está siendo consultado por este PHP.</p>
<pre><code><?php //print_r($datos); ?></code></pre>
<h3>Analizando el CSV, podemos obtener distintos números.</h3>
<p>Pero antes de revisar los números conviene saber que, según el Reglamento general de carrera académica de la Universidad de Chile, son tres las Categorías Académicas:</p>
<ol>
<li>La <a href="http://www.uchile.cl/portal/presentacion/normativa-y-reglamentos/4860/titulo-ii-de-la-categoria-y-carrera-academica-ordinaria">Categoría Académica Ordinaria</a>, con cinco rangos consecutivos: Ayudante, Instructor, Profesor Asistente, Profesor Asociado y Profesor Titular.</li>
<li>La <a href="http://www.uchile.cl/portal/presentacion/normativa-y-reglamentos/4861/titulo-iii-de-la-categoria-y-carrera-academica-docente">Categoría Académica Docente</a>, con tres rangos consecutivos: Profesor Asistente de Docencia, Profesor Asociado de Docencia y Profesor Titular de Docencia.</li>
<li>La <a href="http://www.uchile.cl/portal/presentacion/normativa-y-reglamentos/4863/titulo-iv-de-la-categoria-academica-adjunta">Categoría Académica Adjunta</a>, con dos rangos: Instructor Adjunto y Profesor Adjunto.</li>
</ol>
<?php
$adjunta = 0;
$ordinaria = 0;
$docente = 0;
$horas = 0;
for ($a = 0; $a < $all = count($datos); $a++) {
  if(substr_count($datos[$a]['Rango'],'Adjunto') > 0){
    $adjunta++;
  }elseif(substr_count($datos[$a]['Rango'],'Docencia') > 0){
    $docente++;
  }else{
    $ordinaria++;
  }
  $horas= $horas+$datos[$a] ['Horas'];
}
;?>
<p><strong>Diseño dispone de <?php echo $all;?> académicos</strong>. <strong>(<?php echo round($horas/$all);?> horas semanales en promedio)</strong> <?php echo $ordinaria;?>  de ellos están en la Categoría Académica Ordinaria, <?php echo $docente;?> están en la Categoría Académica Docente, y <?php echo $adjunta;?> están en la Categoría Académica Adjunta.</p>
<?php
$full_time = 0;
for ($b = 0; $b < $all; $b++) {
if((substr_count($datos[$b]['Rango'],'Adjunto') == 0) && (substr_count($datos[$b]['Rango'],'Docencia') == 0) && ($datos[$b]['Horas'])==44){
$full_time++;
    }
};?>
<p>De los <?php echo $ordinaria;?> académicos en Categoría Académica Ordinaria, <?php echo $full_time;?> tienen jornada completa. Ellos son:</p>
<ol>
<?php
for ($c = 0; $c < $all; $c++) {
  if((substr_count($datos[$c]['Rango'],'Adjunto') == 0) && (substr_count($datos[$c]['Rango'],'Docencia') == 0) && ($datos[$c]['Horas'])==44){
    echo '<li>'.$datos[$c]["Nombres"].' '.$datos[$c]["Apellidos"].' ('.$datos[$c]["Rango"].')</li>';
  }
};?>
</ol>
<p>Pero si reducimos el listado recién presentado a los que "han demostrado una actividad académica sostenida, capacidad y aptitudes para realizarla en forma autónoma y creativa y dominio de su especialidad", sólo tenemos:</p>
<ol>
<?php
for ($d = 0; $d < $all; $d++) {
  if((($datos[$d]['Rango']) == "Profesor Asociado") && ($datos[$d]['Horas'])==44){
    echo '<li>'.strstr($datos[$d]["Nombres"], ' ', true).' '.$datos[$d]["Apellidos"].' ('.$datos[$d]["Rango"].') ('.$datos[$d]["Horas"].')</li>';
}
if((($datos[$d]['Rango']) == "Profesor Asociado de Docencia") && ($datos[$d]['Horas'])<=44){
  echo '<li>'.strstr($datos[$d]["Nombres"], ' ', true).' '.$datos[$d]["Apellidos"].' ('.$datos[$d]["Rango"].') ('.$datos[$d]["Horas"].')</li>';
}

};?>
</ol>
<p>Ahora corresponde a ustedes seguir examinando los datos duros.</p>
<div class="alert alert-danger">
<h4>Ejercicio:</h4>
<p>Revise el <a href="http://www.uchile.cl/portafolio-academico/">Portafolio académico</a>, confirme que se hayan agregado todos los académicos de diseño al CSV. De faltar alguno, por favor agréguelo. Los profesores que no aparecen en el portafolio son docentes invitados (contractualmente no son académicos de la Universidad de Chile; no corresponde agregarlos al CSV).</p>
<p>Haga un listado con los académicos que "han demostrado una actividad docente sostenida, realizándola en forma autónoma y creativa, con pleno dominio de su especialidad, dando a conocer su experiencia en textos de uso docente". Junto a cada nombre, indique sus horas contratadas.</p>
<p>Calcule el promedio de horas que dedican los académicos a sus actividades en Diseño de la Universidad de Chile.</p>
<p>Si resuelve todo antes de que termine la clase: intente agregar una página de detalle, donde se despliegue más información sobre cada académico.</p>
<p>Antes de entregar, retire la impresión de la información contenida en la variable $datos (<code>//print_r</code>).</p>
</ul>
</div>
</section>
<footer>
<p>Mayo de 2017 &bull; Esta obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/4.0/">Licencia Creative Commons Atribución-NoComercial-CompartirIgual 4.0 Internacional</a>.</p>
</footer>
</div><!--/col-sm-10 col-sm-offset-1-->
</div><!--/row-->
</div><!--/container-->
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
