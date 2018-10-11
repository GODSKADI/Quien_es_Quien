<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <title>Pruebas Lectura Arhcivos</title>
  </head>
  <body>
    <?php
    $path = "cosas.txt";
    if(!file_exists($path)){
      exit("File Not found");
    }

    $lineas = file($path);
    foreach ($lineas as $num_linea => $linea) {
      echo "<p>Linea {$num_linea} :".htmlspecialchars($linea)."</p>";
    }
     ?>
  </body>
</html>
