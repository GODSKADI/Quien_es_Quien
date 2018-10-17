<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/script.js"></script>
    <title>Quien es Quien?</title>
  </head>
  <body>
    <head>
      <h1>Quien es Quien?</h1>
    </head>
    <?php
    //Escritura de archivos
    $fp = fopen("log.txt", "a");
    fwrite($fp, "Primera prueba de escritura en un archivo.". PHP_EOL);
    fclose($fp);

    $filas = 3;
    $columnas = 4;
    $totalCeldas = ($filas * $columnas / 2);

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

    /*echo "<div id='cartaServer'>";
      echo "<div class='flip-container' ontouchstart='this.classList.toggle('hover');'>";
        echo "<div class = 'flipper'>";
          echo "<div class ='front'><img src='imagenes/back_img.jpg'></div>";
          echo "<div class = 'back'><img src='imagenes/$imgSelecServer'></div>";
        echo "</div>\n";
      echo "</div>";
    echo "</div>";*/

    echo "<div id='cartaServer'>";
      echo "<div class='flip-container' onclick='flip()'>";
        echo "<div>";
          //echo "<div class ='front'><img src='imagenes/back_img.jpg'></div>";
          echo "<div id ='card'><img src='imagenes/$imgSelecServer'></div>";
        echo "</div>\n";
      echo "</div>";
    echo "</div>";

    echo "<div id ='cartasCliente' class= 'cartasCliente'\n>";
    echo "<table class='table' id='tablacartas'>\n";
      for ($i=0; $i < 3; $i++) {
        echo "<tr>";
        for ($j=0; $j < 4;) {
          $imgSelecCliente = array_rand($imgArray);
          if(in_array($imgSelecCliente, $repetidos) === false){
            echo "<td>";
            echo "<div class='flip-container' ontouchstart='this.classList.toggle('hover');'>";
              echo "<div class = 'flipper'>";
                echo "<div class ='front'><img src='imagenes/$imgSelecCliente'></div>\n";
                echo "<div class = 'back'><img src='imagenes/back_img.jpg'></div>\n";
              echo "</div>";
            echo "</div>";
            echo "</td>";
            array_push($repetidos, $imgSelecCliente);
            $j++;
          }
        }
        echo "</tr>";
      }
      echo "</table></div>";
     ?>
  </body>
</html>
