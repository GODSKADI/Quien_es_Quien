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
        <p class="titulo"><a>¿QUIEN ES QUIEN?</a></p>
      </div>
    </head>
    <?php


    //-------------------------------------------------------------------------------------//
    //config
    $config = "config.txt";
    if(!file_exists($config)){
      exit("File Config Not found");
    }
    //imagenes
    $imag = "imagenes.txt";
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
      //echo "<p>-$imagenes[$z]-</p>";
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
        fwrite($fp, "$now | Error en la configuracion Caracteristicas diferentes en el archivo Img - Conf" . PHP_EOL);
        fclose($fp);
        exit ("Error consulte el archivo log.txt para mas informacion");
      }
      if(in_array($Cabells[$i],$configCabell)){
      }else{
        $fp = fopen("log.txt","a");
        $now = date("Y-m-d H:i:s");
        fwrite($fp, "$now | Error en la configuracion Caracteristicas diferentes en el archivo Img - Conf" . PHP_EOL);
        fclose($fp);
        exit ("Error consulte el archivo log.txt para mas informacion");
      }
      if(in_array($Sexes[$i],$Sexes)){
      }else{
        $fp = fopen("log.txt","a");
        $now = date("Y-m-d H:i:s");
        fwrite($fp, "$now | Error en la configuracion Caracteristicas diferentes en el archivo Img -Conf" . PHP_EOL);
        fclose($fp);
        exit ("Error consulte el archivo log.txt para mas informacion");
      }
    }
    //--------------------------------------------------------------------//
    //Array de imagenes
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
    //Random del Array de imagenes para la carta del servidor
    $imgSelecServer = array_rand($imgArray);
    $repetidos = [];
    $c = 0;
    echo "<div class='contenedorCartaServer'>";
      echo "<div class='ranking1'><p class='ranking'><a>Ranking</a></p>
                <p class='posiciones'>1</p>
                <p class='posiciones'>2</p>
                <p class='posiciones'>3</p>
                <p class='posiciones'>4</p>
                <p class='posiciones'>5</p>
            </div>";
      echo "<div class='ranking2'><p class='ranking'><a>Ranking</a></p>
                <p class='posiciones'>6</p>
                <p class='posiciones'>7</p>
                <p class='posiciones'>8</p>
                <p class='posiciones'>9</p>
                <p class='posiciones'>10</p>
            </div>";
      echo "<div id='cartaServer' class='cartaServer'>";
          echo "<div><img src='imagenes/$imgSelecServer' hidden></div>";
          echo "<div><img src='imagenes/back_img.jpg'></div>";
      echo "</div>";
    echo "</div>";
    //echo "<div class='contenedorGeneral'>";
    //Contenedor con tabla para las cartas del Cliente
    echo "<div class ='contenedorCartasCliente' class= 'cartasCliente'\n>";
    echo "<table class='table' id='tablacartas'>\n";
      for ($i=0; $i < 3; $i++) {
        echo "<tr>";
        for ($j=0; $j < 4;) {
          //Random del Array de imagenes sin repeticiones
          //$c para diferenciar id's y que no se repitan
          $imgSelecCliente = array_rand($imgArray);
          if(in_array($imgSelecCliente, $repetidos) === false){
            echo "<td>";
            echo "<div id='carta$c' class='cartaCliente' onclick='girarCartas($c)'>";
                echo "<div class='frontal' ><img src='imagenes/$imgSelecCliente'></div>";
                echo "<div class='trasera'><img src='imagenes/back_img.jpg'></div>";
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
      echo "<div class='contenedorCombo'>";
      echo "<h2 id='validacion'></h2>";
      echo "<h2>Preguntas</h2>";
      echo "<div class='combo1'>
          <select id='pelo'>
          <option value='null'></option>
          <option value='rubio'>El color del pelo es rubio?</option>
          <option value='moreno'>El color del pelo es Moreno?</option>
          <optionvalue='negro'>El color del pelo es Negro?</option>
          </select>
          <div><p class='respuestaServerPelo'></p></div>
      </div>";
      echo "<div class='combo2'>
          <select id='sexo'>
          <option value='null'></option>
          <option value='hombre'>Es un Hombre?</option>
          <option value='mujer'>Es una Mujer?</option>
          </select>
          <div><p class='respuestaServerSexo'></p></div>
      </div>";
      echo "<div class='combo3'>
          <select id='gafas'>
          <option value='null'></option>
          <option value='gafas'>Tiene gafas?</option>
          <option value='no_gafas'>No tiene gafas?</option>
          </select>
          <div><p class='respuestaServerGafas'></p></div>
      </div>";
      echo "<input type='button' value='Preguntar' onclick='validar()'></input>";
      echo "<input class='easy' type='button' value='EASY'></input>";
      echo "</div>";
     ?>
  </body>
</html>
