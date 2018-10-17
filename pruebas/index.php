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
    //imagenes
    $imag = "imagenes_p.txt";
    if(!file_exists($imag)){
      exit("File Imagenes Not found");
    }
    $cartes= array();
    $lineas = file($config);
    foreach ($lineas as $num_linea => $linea) {
      array_push($cartes,strrchr($linea," "));
    }
    //print_r($cartes);
    echo "<br>";
    $imagenes = array();
    $fila;
    $filas = file($imag);
    $auxU = 0;
    $auxC = 1;
    $auxS = 2;
    foreach ($filas as $key => $value) {
      $fila= preg_split("/[\s,:]+/",$value);
      array_push($imagenes,$fila[0]);
      //array_push($ulleres,$fila[2]);
      $filaAux =trim($fila[2],"\n");
      $cartesAux = trim($cartes[$auxU]," \t\n\r");
      //var_dump($filaAux);
      //var_dump($cartesAux);
      if($filaAux!=$cartesAux){
        exit("Error en la configuracion mire el archivo log");
        //echo "Ulleres Good-";
      }
      //echo "Ulleres Good";
      $auxU = $auxU+3;
      //array_push($cabell,$fila[4]);
      $filaAux = trim($fila[4],"\n");
      $cartesAux = trim($cartes[$auxC]," \t\n\r");
      //var_dump($filaAux);
      //echo "<br>";
      var_dump($cartesAux);
      if($filaAux!=$cartesAux){
        exit("Error en la configuracion mire el archivo log");
      }
      $auxC = $auxC +3;
      //array_push($sexe,$fila[6]);
      $filaAux = trim($fila[6],"\n");
      $cartesAux = trim($cartes[$auxS]," \t\n\r");
      //var_dump($filaAux);
      //echo "<br>";
      //var_dump($cartesAux);
      if($filaAux!=$cartesAux){
        exit("Error en la configuracion mire el archivo log");
      }
      $auxS = $auxS +3;
    }
    for ($z=0; $z <12 ; $z++) {
      //echo "<p>-$imagenes[$z]-</p>";
      for ($i=0; $i<12 ; $i++) {
        $iterador =$i+$z+1;
        if($imagenes[$z]==$imagenes[$iterador]){
          exit ("Error en las imagenes");
        }
        //echo "$imagenes[$iterador]";
      }
    }
     ?>
  </body>
</html>
