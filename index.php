<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
    <title>Quien es Quien?</title>
  </head>
  <body background="imagenes/background.jpg">
    <head>
      <div id="container">
        <p><a>¿QUIEN ES QUIEN?</a></p>
      </div>
    </head>
    <?php


    //-------------------------------------------------------------------------------------//
    //Del archivo config.txt a array
    $config = "config.txt";
    if(!file_exists($config)){
      $fp = fopen("log.txt","a");
      fwrite($fp, "File Config Not found" . PHP_EOL);
      fclose($fp);
      exit("File Config Not found");

    }
    //Del archivo imagenes.txt a array
    $imag = "imagenes.txt";
    if(!file_exists($imag)){
      $fp = fopen("log.txt","a");
      fwrite($fp, "File Imagenes Not found" . PHP_EOL);
      fclose($fp);
      exit("File Imagenes Not found");
    }
    //Split a array para tener solo los canpos con Strings sin caracteres especiales
    $cartes= array();
    $lineas = file($config);
    foreach ($lineas as $num_linea => $linea) {
      array_push($cartes,strrchr($linea," "));
    }
    //Variables para deteccion de errores
    $imagenes = array();
    $fila;
    $filas = file($imag);
    //auxiliares para la posicion de los atributos de las cartas
    $auxU = 0;
    $auxC = 1;
    $auxS = 2;
    //Split del archivo imagenes a la vez que conprovamos errores de formato
    foreach ($filas as $key => $value) {
      $fila= preg_split("/[\s,:]+/",$value);//split del campo
      array_push($imagenes,$fila[0]);//guardamos el nombre de la imagen
      $filaAux =trim($fila[2],"\n");
      $cartesAux = trim($cartes[$auxU]," \t\n\r");
      if($filaAux!=$cartesAux){
        $fp = fopen("log.txt","a");
        fwrite($fp, "Error en la configuracion mire el archivo log" . PHP_EOL);
        fclose($fp);
        exit("Error en la configuracion mire el archivo log");
      }
      $auxU = $auxU+3;//posicion del atributo +3 posiciones
      $filaAux = trim($fila[4],"\n");
      $cartesAux = trim($cartes[$auxC]," \t\n\r");
      if($filaAux!=$cartesAux){
        $fp = fopen("log.txt","a");
        fwrite($fp, "Error en la configuracion mire el archivo log" . PHP_EOL);
        fclose($fp);
        exit("Error en la configuracion mire el archivo log");
      }
      $auxC = $auxC +3;//posicion del atributo +3 posiciones
      $filaAux = trim($fila[6],"\n");
      $cartesAux = trim($cartes[$auxS]," \t\n\r");
      if($filaAux!=$cartesAux){
        $fp = fopen("log.txt","a");
        fwrite($fp, "Error en la configuracion mire el archivo log" . PHP_EOL);
        fclose($fp);
        exit("Error en la configuracion mire el archivo log");
      }
      $auxS = $auxS +3;
    }
    //Comprobar nombres de imagenes duplicadas
    for ($z=0; $z <12 ; $z++) {
      for ($i=0; $i<12 ; $i++) {
        $iterador =$i+$z+1;
        if($imagenes[$z]==$imagenes[$iterador]){
          $fp = fopen("log.txt","a");
          fwrite($fp, "Error en las imagenes" . PHP_EOL);
          fclose($fp);
          exit ("Error en las imagenes");
        }
      }
    }
    //--------------------------------------------------------------------//
    $imgArray = [
    "imagen1.png" => "imagen1",
    "imagen2.png" => "imagen2",
    "imagen3.png" => "imagen3",
    "imagen4.png" => "imagen4",
    "imagen5.png" => "imagen5",
    "imagen6.png" => "imagen6",
    "imagen7.png" => "imagen7",
    "imagen8.png" => "imagen8",
    "imagen9.png" => "imagen9",
    "imagen10.png" => "imagen10",
    "imagen11.png" => "imagen11",
    "imagen12.png" => "imagen12"
    ];
    $imgSelecServer = array_rand($imgArray);
    $repetidos = [];
    $c = 0;
    echo "<div class='contenedorCartaServer'>";
      echo "<div id='cartaServer' class='cartaServer'>";
          echo "<div '><img src='imagenes/$imgSelecServer' hidden></div>";
          echo "<div><img src='imagenes/back_img.jpg'></div>";
      echo "</div>";
    echo "</div>";

    echo "<div class ='contenedorCartasCliente' class= 'cartasCliente'\n>";
    echo "<table class='table' id='tablacartas'>\n";
      for ($i=0; $i < 3; $i++) {
        echo "<tr>";
        for ($j=0; $j < 4;) {
          $imgSelecCliente = array_rand($imgArray);
          if(in_array($imgSelecCliente, $repetidos) === false){
            echo "<td>";
            echo "<div id='carta$c' class='cartaCliente' onclick='flip($c)'>";
                echo "<div class='front' ><img src='imagenes/$imgSelecCliente'></div>";
                echo "<div class='back'><img src='imagenes/back_img.jpg'></div>";
            echo "</div>";
            echo "</td>";
            array_push($repetidos, $imgSelecCliente);
            $j++;
            $c++;
          }
        }
        echo "</tr>";
      }
      echo "</table></div>";
     ?>
  </body>
</html>
