<?php include('header.php');?>
<section>

<h3>Esta clase se divide en <?php echo count($partes);?> partes:</h3>

<pre><code><?php print_r($partes);?></code></pre>

<h4>Estamos en la primera parte, de <a href="<?php echo($vinculos[0]);?>"><?php print_r($partes[0]);?></a>, donde revisaremos</h4>

<ul>
<li>cómo se estructura una <a href="http://php.net/manual/es/language.variables.basics.php" rel="nofollow" target="_blank">variable</a>;</li>
<li>cómo se estructura un <a href="http://php.net/manual/es/language.types.array.php" rel="nofollow" target="_blank">arreglo</a>; y</li>
<li>cómo ocupar las funciones
<code><button type="button" data-toggle="tooltip" data-placement="bottom" title="Devuelve el último componente de nombre de una ruta">basename($_SERVER['PHP_SELF'])</button></code>
<code><button type="button" data-toggle="tooltip" data-placement="bottom" title="Muestra una o más cadenas (strings)">echo();</button></code>
<code><button type="button" data-toggle="tooltip" data-placement="bottom" title="Imprime información legible para humanos sobre una variable">print_r();</button></code>
<code><button type="button" data-toggle="tooltip" data-placement="bottom" title="Incluye y evalúa el archivo especificado">include();</button></code>
</li>
</ul>

<p>No debería tomar más de <?php echo($tiempo*2);?> minutos comprender lo que se presenta en esta primera parte.</p>
<p>En la segunda parte, de <a href="php_csv.php"><?php print_r($partes[1]);?></a>, revisaremos cómo trabajar con un documento <a href="https://es.wikipedia.org/wiki/Valores_separados_por_comas" rel="nofollow" target="_blank">CSV</a>,
  y cómo <a href="https://es.wikipedia.org/wiki/Script_del_lado_del_servidor" rel="nofollow" target="_blank">encargarle al servidor</a> completar una página web, utilizando <a href="http://php.net/manual/es/control-structures.for.php" rel="nofollow" target="_blank">un loop <em>for</em></a>
  y <a href="https://www.w3schools.com/php/php_if_else.asp" ref="nofollow"  target="_blank">declaraciones condicionales</a>.</p>
<p>En la tercera parte, de <a href="php_json.php"><?php print_r($partes[2]);?></a>, trabajaremos con un <a href="http://www.json.org/json-es.html" rel="nofollow" target="_blank">JSON</a>, insisitiendo en encargarle trabajo al servidor.</p>
<p>En la cuarta y última parte, de <a href="php_geojson.php"><?php print_r($partes[3]);?></a>, revisaremos cómo trabajar con un documento <a href="http://geojson.org/" rel="nofollow" target="_blank">GeoJSON</a>.</p>
</section>
<?php include('footer.php');?>
