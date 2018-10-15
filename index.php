<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="scrip/script.js"></script>
    <title>Quien es Quien?</title>
  </head>
  <body>
    <head>
      <h1>Quien es Quien?</h1>
    </head>
    <?php
    $imgArray = [
    "IQ.png" => "IQ",
    "Ela.png" => "Ela",
    "Maverick.png" => "Maverick",
    "BlackBeard.png" => "BlackBeard",
    "Caveira.png" => "Caveira",
    "Lord.png" => "Lord",
    "Kapkan.png" => "Kapkan",
    "Lesion.png" => "Lesion",
    "Mira.png" => "Mira",
    "Buck.png" => "Buck",
    "Rook.png" => "Rook",
    "Zofia.png" => "Zofia"
    ];
    $imgSelecServer = array_rand($imgArray);
    $repetidos = [];
    echo "<div id='cartaServer'><img src='imagenes/back_img.jpg'><img id='imgServer' src='imagenes/$imgSelecServer'></div>\n";
    echo "<div id='cartasCliente'\n><table class='table' id='tablacartas'>\n";
      for ($i=0; $i < 3; $i++) {
        echo "<tr>";
        for ($j=0; $j < 4;) {
          $imgSelecCliente = array_rand($imgArray);
          if(in_array($imgSelecCliente, $repetidos) === false){
            echo "<td><img src='imagenes/$imgSelecCliente'></td>\n";
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
