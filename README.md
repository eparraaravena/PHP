# PHP

### Introducción

PHP es un lenguaje de programación de código abierto, [nacido para-](http://php.net/manual/es/history.php.php) y [usado en](http://spectrum.ieee.org/computing/software/the-2016-top-programming-languages) el desarrollo de sitios web de contenido dinámico. 

PHP se ejecuta del lado del [servidor](https://es.wikipedia.org/wiki/Servidor), afectando al documento completo antes de que éste sea enviado al [cliente](https://es.wikipedia.org/wiki/Cliente_(inform%C3%A1tica)). Esta es su principal diferencia con [JavaScript](https://developer.mozilla.org/es/docs/Web/JavaScript/Una_re-introducci%C3%B3n_a_JavaScript#Información_general), que se ejecuta del [lado del cliente](https://es.wikipedia.org/wiki/Lado_del_cliente), afectando al [DOM](https://developer.mozilla.org/es/docs/Referencia_DOM_de_Gecko/Introducci%C3%B3n#DOM_y_JavaScript).

Como PHP se ejecuta [del lado del servidor](https://es.wikipedia.org/wiki/Script_del_lado_del_servidor): Nunca aparece al “ver código fuente”, ni existe una Consola de PHP en los navegadores. Por esta razón, para compartir tus script en PHP puedes usar servicios como [codepad](http://codepad.org/)……… Y para resolver muchas dudas existe [Stackoverflow](http://stackoverflow.com/questions/tagged/php), además del sitio con [referencias oficiales de PHP](http://php.net/manual/es/langref.php).

Para que se ejecute PHP en sus computadores, en esta clase **deben tener instalado [MAMP](https://www.mamp.info/en/)**. Este programa nos permite montar un servidor local, para trabajar con **Apache** (servidor HTTP), **MySQL** (sistema de gestión de bases de datos) y **PHP** (lenguaje de programación).

Para trabajar con PHP debemos usar documentos con extensión `*.php`, los que se pueden crear de la misma manera que normalmente se crean los documentos `*.html`: trabajando con cualquier editor de código.

Dentro de los documentos con extensión `*.php` tenemos que usar etiquetas de apertura y cierre particulares, que son `<?php` y `?>` (las instrucciones que estén entre estas etiquetas serán filtradas e interpretadas en el servidor.

Entre `<?php` y `?>` se pueden escribir una o varias instrucciones. Si se escriben varias, éstas deben separarse mediante punto y coma `;`. Y si necesitan escribir comentarios de una línea, deben anteponer un doble slash `//`. [Por ejemplo](http://codepad.org/ZZXEWJXK): 

```
<?php 
//primero defino una variable
$inception = "película escrita, producida y dirigida por Christopher Nolan";
//luego imprimo el contenido de la variable
echo $inception;
?>
```

Como notaron en el ejemplo, las [variables en PHP](http://php.net/manual/es/language.variables.basics.php) se declaran con un signo peso pegado al nombre de la variable. Será muy necesario poner atención a esta y otras [diferencias de PHP con JavaScript](http://profesor.faco.cl/diferencias.php).
