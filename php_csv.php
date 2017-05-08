<?php include('header.php')?>
<section>

<?php $datos = array_map('str_getcsv', file('data/comma-separated-values.csv')); ?>

<h3>PHP+CSV</h3>

<p>La mayoría aportó con sus 5 respuestas a una encuesta. Pasé sus respuestas a un documento <a href="https://es.wikipedia.org/wiki/Valores_separados_por_comas" rel="nofollow" target="_blank">CSV</a>,
que en este caso se llama <code>data/comma-separated-values.csv</code>.</p>
<p>El documento es consultado mediante PHP. Después de esta consulta se transforma en el <a href="https://www.w3schools.com/php/php_arrays_multi.asp" rel="nofollow" target="_blank">array multidimensional</a> que pueden ver a continuación:</p>

<pre><code><?php print_r($datos);?></code></pre>

<p>Aprovechando este  <a href="https://www.w3schools.com/php/php_arrays_multi.asp" rel="nofollow" target="_blank">array multidimensional</a>, y trabajando con un <a href="http://php.net/manual/es/control-structures.for.php" rel="nofollow" target="_blank">loop <em>for</em></a>, puedo <a href="https://es.wikipedia.org/wiki/Script_del_lado_del_servidor" rel="nofollow" target="_blank">encargarle al servidor</a> generar una "tarjeta" por cada respuesta.</p>
<p>Dentro de este loop <em>for</em> tuve que agregar una <a href="https://www.w3schools.com/php/php_if_else.asp" ref="nofollow" target="_blank">declaración condicional</a> por un par de estudiantes disconformes con las presentaciones: La respuesta "ninguna de las anteriores" sonaba raro pegada al final de la frase:</p>
<blockquote>En su opinión, la presentación más completa, clara y entretenida fue <code>[ninguna de las anteriores]</code></blockquote>
<p>Cuando se cumple la condición de que el contenido de la variable correspondiente es "ninguna de las anteriores", la frase cambia por:</p>
<blockquote>En su opinión, ninguna presentación fue completa, clara ni entretenida. Tampoco hubo presentaciones útiles.</blockquote>
<p>A continuación pueden ver las "tarjetas" de respuesta, cuyo orden es el mismo en que fueron ingresadas a la encuesta.</p>

<div class="row">
<?php for ($n = 0; $n < $nll = count($datos); $n++) {?>
<div class="col-sm-6">
<article class="alert alert-info">
<div class="nro"><?php echo($n+1);?></div>
<img src="data/images/<?php echo($datos[$n][1]);?>.jpg">
<h4> <?php echo($datos[$n][6]);?>
<p>En <a href="http://dis.uchilefau.cl/seminario/grafica-computacional/">Wordpress</a>: <?php echo($datos[$n][3]);?></p>
<p>En GitHub: <a href="<?php echo($datos[$n][2]);?>"><?php echo($datos[$n][2]);?></a></p>
<p>En su opinión,
<?php if(($datos[$n][4])=='Ninguna de las anteriores'){;?>
ninguna presentación fue completa, clara ni entretenida.
<?php }else{;?>
la presentación más completa, clara y entretenida fue <strong>"<?php echo($datos[$n][4]);?>"</strong>.
<?php };?>
<?php if(($datos[$n][5])=='Ninguna de las anteriores'){;?>
Tampoco hubo presentaciones útiles.
<?php }else{;?>
Y la presentación más útil fue <strong>"<?php echo($datos[$n][5]);?>"</strong>.
<?php };?>
</p>
</div>
</article>
<?php };?>
</div>


<div class="alert alert-danger">
<p>Con un vistazo al código, deberían poder responder:</p>
<p>¿De qué manera se hace el "truco" de mostrar la imagen correspondiente a cada uno?</p>
<p>¿Dónde podrían agregar sus nombres?</p>
<p>¿De qué manera podrían modificar la frase de opinión sobre las presentaciones a algo como "[Nombre] cree que…"?</p>
<p>Después de revisar todas las páginas de esta clase, los estudiantes del segundo nivel deben realizar el ejercicio que está en <a href="../dgphp/ejercicio/">la carpeta homónima</a>.</p>
</div>

</section>
<?php include('footer.php')?>
