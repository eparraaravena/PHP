<?php include('header.php')?>
<section>

<?php
$json = file_get_contents('https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/significant_month.geojson');
$datos = json_decode($json,true);
$all = count($datos['features']);
?>

<h3>PHP+GeoJSON</h3>

<p>El <a href="https://earthquake.usgs.gov/" target="_blank" rel="nofollow">Earthquake Hazard Program de la USGS</a> ofrece, en <a href="http://geojson.org/" target="_blank" rel="nofollow">GeoJSON</a>, <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php" title="Real-time Feeds and Notifications" target="_blank" rel="nofollow">notificaciones</a> de la actividad telúrica alrededor del mundo.
  Ofrece <a href="https://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php" target="_blank" rel="nofollow">notificaciones</a> de todos los temblores o colecciones sobre magnitudes específicas, organizados en lapsos de tiempo.</p>
<p>Ahora veamos los temblores más importantes registrados alrededor del mundo en el último mes:</p>

<ol>
<?php $cl = 0;?>
<?php for ($n = 0; $n < $all; $n++) {?>
<li <?php if (substr_count($datos['features'][$n]['properties']['place'], 'Chile') > 0) { echo 'class="chileno"'; $cl++;}?>>
<?php echo $time = date("d-m-Y H:m:s \U\T\C",$datos['features'][$n]['properties']['time']/1000);?> &bull; M <?php echo ($datos['features'][$n]['properties']['mag']);?> &bull;
<a href="https://www.google.cl/maps/place/<?php echo ($datos['features'][$n]['geometry']['coordinates'][1]);?>,<?php echo ($datos['features'][$n]['geometry']['coordinates'][0]);?>"><?php echo ($datos['features'][$n]['properties']['place']);?></a> &bull;
<a href="php_geojson_detalles.php?url=<?php echo ($datos['features'][$n]['properties']['detail']);?>">Más detalles</a>.
</li>
<?php } ;?>
</ol>

<p>De los <?php echo $all;?> temblores más importantes registrados alrededor del mundo en el último mes, <?php echo $cl?> han ocurrido en Chile.</p>
<p>En este caso, el documento GeoJSON consultado mediante PHP se tranformó en el <a href="https://www.w3schools.com/php/php_arrays_multi.asp" rel="nofollow" target="_blank">array multidimensional</a> que pueden ver a continuación:</p>

<pre><code><?php print_r($datos);?></code></pre>

<div class="alert alert-danger">
<p>Revisando el código y cambiando el GeoJSON consultado, indiquen:</p>
<ul>
<li>¿Cuántos temblores (All Earthquakes) se hen registrado en Chile en el último mes?</li>
<li>¿Cuántos de ellos han afectado a Valparaíso?</li>
</ul>
</div>

</section>
<?php include('footer.php');?>
