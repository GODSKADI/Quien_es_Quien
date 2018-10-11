<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Quien es Quien?</title>
  </head>
  <body>
    <head>
      <h1>Quien es Quien?</h1>
    </head>
    <?php
    echo "<div id='cartaServer'>Carta server</div>\n";
    echo "<div id='cartasCliente'\n><table class='table' id='tablacartas'>\n";
      for ($i=0; $i < 3; $i++) {
        echo "<tr>";
        for ($j=0; $j < 3; $j++) {

          echo "<td class='table'>carta client ".$j."</td>\n";
        }
        echo "</tr>";
      }
      echo "</table></div>";
     ?>
  </body>
</html>
