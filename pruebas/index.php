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
    $imagenes = array();
    $imagen= array();
    $filas = file($imag);
    foreach ($filas as $key => $value) {
      array_push($imagen,$value);
    }
    print_r($imagen);
    $entrada = "imagen12.jpg : ulleres: no , cabell: negre , sexe: dona";
    $cosas = explode(' ',$entrada);
    print_r($cosas);
     ?>
  </body>
</html>
