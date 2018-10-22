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
    $configUlleres= array();
    $configCabell= array();
    $configSexe= array();
    $lineas = file($config);
    for ($i=0; $i <3 ; $i++) {
      $auxiliar = "";
      if($i==0){
        $auxiliar = preg_split("/[\s:]+/",$lineas[$i]);
        for ($j=1; $j <(count($auxiliar)-1); $j++) {
          array_push($configUlleres,$auxiliar[$j]);
        }
      }
      if($i==1){
        $auxiliar = preg_split("/[\s:]+/",$lineas[$i]);
        for ($j=1; $j <(count($auxiliar)-1); $j++) {
          array_push($configCabell,$auxiliar[$j]);
        }
      }
      if($i==2){
        $auxiliar = preg_split("/[\s:]+/",$lineas[$i]);
        for ($j=1; $j <(count($auxiliar)-1); $j++) {
          array_push($configSexe,$auxiliar[$j]);
        }
      }
    }
    print_r($configUlleres);
    print_r($configCabell);
    print_r($configSexe);
    echo "<br>";
    $imagenes = array();
    $Ulleress = array();
    $Cabells = array();
    $Sexes = array();
    $fila;
    $filas = file($imag);
    foreach ($filas as $key => $value) {
      $fila= preg_split("/[\s,:]+/",$value);
      array_push($imagenes,$fila[0]);
      array_push($Ulleress,$fila[2]);//Ulleres
      array_push($Cabells,$fila[4]);//cabell
      array_push($Sexes,$fila[6]);//Sexe
    }
    //Primer error de la imagenes
    for ($z=0; $z <12 ; $z++) {
      echo "<p>-$imagenes[$z]-</p>";
        for ($i=0; $i<12 ; $i++) {
          $iterador =$i+$z+1;
          if($imagenes[$z]==$imagenes[$iterador]){
            $fp = fopen("log.txt","a");
            $now = date("Y-m-d H:i:s");
            fwrite($fp, "$now | Error en la configuracion imagenes duplicadas" . PHP_EOL);
            fclose($fp);
            exit ("Error en las imagenes");
          }
        }
      }
      //Error caracteristics iguales
    for ($g=0; $g <count($Ulleress) ; $g++) {
        for ($i=$g+1; $i <count($Ulleress) ; $i++) {
          if(($Ulleress[$g]==$Ulleress[$i]) && ($Cabells[$g]==$Cabells[$i]) && ($Sexes[$g]==$Sexes[$i])){
            $fp = fopen("log.txt","a");
            $now = date("Y-m-d H:i:s");
            fwrite($fp, "$now | Error en la configuracion Caracteristicas iguales" . PHP_EOL);
            fclose($fp);
            exit ("Error consulte el archivo log.txt para mas informacion");
          }
        }
    }

    for ($i=0; $i <count($imagenes); $i++) {
      if(in_array($Ulleress[$i],$configUlleres)){
      }else{
        $fp = fopen("log.txt","a");
        $now = date("Y-m-d H:i:s");
        fwrite($fp, "$now | Error en la configuracion Caracteristicas diferentes en el archivo log" . PHP_EOL);
        fclose($fp);
        exit ("Error consulte el archivo log.txt para mas informacion");
      }
    }
    var_dump($imagenes);
   ?>
  </body>
</html>
