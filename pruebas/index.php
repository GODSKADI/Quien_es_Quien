<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
    <title>Pruebas Lectura Arhcivos</title>
  </head>
  <body>
    <?php
    //config
    $config = "config_p.txt";
    if(!file_exists($config)){
      exit("File Config Not found");
    }
    $cartes= array();
    $lineas = file($config);
    foreach ($lineas as $num_linea => $linea) {
      array_push($cartes,strrchr($linea," "));
    }
    print_r($cartes);
    //imagenes
    $imag = "imagenes_p.txt";
    if(!file_exists($imag)){
      exit("File Imagenes Not found");
    }
    echo "<br>";
    $imagenes = array();
    $imagen;
    $filas = file($imag);
    foreach ($filas as $key => $value) {
      $imagen= preg_split("/[\s,:]+/",$value);
      array_push($imagenes,$imagen);
    }
    print_r($imagenes);
    echo "<br>";
     ?>
  </body>
</html>
