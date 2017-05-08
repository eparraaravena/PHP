<?php include('header.php')?>
<section>

<?php
$json = file_get_contents('https://api.smartcitizen.me/v0/devices/world_map');
$datos = json_decode($json,true);
?>

<h3>PHP+JSON</h3>

<p>El proyecto <a href="https://smartcitizen.me/" rel="nofollow" target="_blank">Smart Citizen</a> se basa en geolocalización, Internet, hardware y software libres. Busca servir como nodo productivo en la generación de indicadores abiertos.</p>
<p>La generación de indicadores abiertos se logra mediante el Smart Citizen Kit: una plataforma open-source de monitoreo ambiental, con un <a href="https://www.arduino.cc/en/ArduinoAtHeart/Products" rel="nofollow" target="_blank">corazón de Arduino</a>, equipado con sensores de calidad de aire, temperatura, sonido, humedad y cantidad de luz, además de un cargador solar y una antena WiFi que permite poner en línea lo <em>sensado</em> (con s de <u>s</u>ensor).</p>
<p>Ahora vamos a buscar indicadores de algunos Smart Citizen Kits: En <a href="http://developer.smartcitizen.me/#devices" rel="nofollow" target="_blank">SmartCitizen API Reference</a> que:</p>
<blockquote>returns an array with of summarized device objects for displaying on the world map.</blockquote>

<p>Este <a href="http://www.json.org/json-es.html" rel="nofollow" target="_blank">JSON</a> nos entregará información de los <?php echo $todos = count($datos);?> Smart Citizen Kits instalados alrededor del mundo.</p>

<h5>Algunos de ellos están instalados en Chile</h5>

<?php $year=0;?>
<ol>
<?php for($n = 0; $n < $todos; $n++){?>
  <?php if(($datos[$n]['country_code']) == 'CL'){?>
  <li>El Smart Citizen Kit <?php echo($datos[$n]['id']);?> está <?php echo('instalado en '.$datos[$n]['city']);?> (<a href="https://www.google.cl/maps/place/<?php echo($datos[$n]['latitude'].','.$datos[$n]['longitude']);?>" rel="nofollow" target="_blank">Ver ubicación en Google Maps</a>, <a href="php_json_detalles.php?url=https://api.smartcitizen.me/v0/devices/<?php echo($datos[$n]['id']);?>.json">Ver detalles</a>).</li>
    <?php if (substr_count($datos[$n]['data'][''],'2017') > 0){?>
      <?php $year++;?>
    <?php };?>
  <?php };?>
<?php };?>
</ol>

<h5><?php echo $year;?> de los instalados en Chile han generado indicadores durante este año</h5>

<?php $month=0;?>
<ol>
<?php for($n = 0; $n < $todos; $n++){?>
  <?php if(($datos[$n]['country_code']) == 'CL'){?>
    <?php if (substr_count($datos[$n]['data'][''],'2017') > 0){?>
      <li>El Smart Citizen Kit <?php echo($datos[$n]['id']);?> está <?php echo('instalado en '.$datos[$n]['city']);?> (<a href="https://www.google.cl/maps/place/<?php echo($datos[$n]['latitude'].','.$datos[$n]['longitude']);?>" rel="nofollow" target="_blank">Ver ubicación en Google Maps</a>, <a href="php_json_detalles.php?url=https://api.smartcitizen.me/v0/devices/<?php echo($datos[$n]['id']);?>.json">Ver detalles</a>).</li>
      <?php if (substr_count($datos[$n]['data'][''],'2017-05') > 0){?>
        <?php $month++;?>
      <?php };?>
    <?php };?>
  <?php };?>
<?php };?>
</ol>

<h5>Y solo <?php echo $month;?> de ellos ha<?php if ($month > 1){?>n<?php };?> generado indicadores durante este mes:</h5>

<ol>
<?php for($n = 0; $n < $todos; $n++){?>
  <?php if(($datos[$n]['country_code']) == 'CL'){?>
    <?php if (substr_count($datos[$n]['data'][''],'2017-05') > 0){?>
      <li>El Smart Citizen Kit <?php echo($datos[$n]['id']);?> está <?php echo('instalado en '.$datos[$n]['city']);?> (<a href="https://www.google.cl/maps/place/<?php echo($datos[$n]['latitude'].','.$datos[$n]['longitude']);?>" rel="nofollow" target="_blank">Ver ubicación en Google Maps</a>, <a href="php_json_detalles.php?url=https://api.smartcitizen.me/v0/devices/<?php echo($datos[$n]['id']);?>.json">Ver detalles</a>).</li>
    <?php };?>
  <?php };?>
<?php };?>
</ol>


<div class="alert alert-danger" role="alert">
<p>Revisa los smartcitizen instalados en todo el mundo, y muestra aquellos que sólo hayan generado algún indicador durante este mes (<?php echo date('Y-m');?>)</p>
</div>

</section>
<?php include('footer.php')?>
