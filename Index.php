<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script type="text/javascript" src="script/easterEgg.js"></script>
    <title>Quien es Quien?</title>
  </head>
  <body background="imagenes/background.jpg">
    <head>
      <div id="container">
        <p class="titulo"><a>¿QUIEN ES QUIEN?</a></p>
      </div>
    </head>
    <?php
    //--------------------------------------------------------------------------------------
    //Iniciar la Session
    session_start();

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
    $imgAtributo = array();
    $fila;
    $filas = file($imag);
    foreach ($filas as $key => $value) {
      $fila= preg_split("/[\s,:]+/",$value);
      array_push($imagenes,$fila[0]);
      array_push($Ulleress,$fila[2]);//Ulleres
      array_push($Cabells,$fila[4]);//cabell
      array_push($Sexes,$fila[6]);//Sexe
      $imgAtributo[] = array($fila[0], $fila[2], $fila[4], $fila[6]);
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
    //Random del Array de imagenes para la carta del servidor
    $imgSelecServer = array_rand($imagenes);
    $imgServer=$imgAtributo[$imgSelecServer][0];
    //--------------------------------------------------------------------------------
    //Guardar carta servidor en la Session
    if (!isset($_SESSION['imgServerSession'])) {
      $_SESSION['imgServerSession'] = $imgAtributo[$imgSelecServer];
    }
    //---------------------------------------------------------------------------------
    $c = 0;


    echo "<div class='contenedorCartaServer'>";
      echo "<div class='ranking1'><p class='ranking'><a>Ranking</a></p>";
      $archivo = fopen ("records.txt","r");
      $numLineas = 0;
      while (!feof($archivo)) {
        $linea = fgets($archivo);
        if(++$numLineas > 0 && $numLineas < 6){
          echo "<p class='posiciones'>$linea</p>";
        }
      }
      fclose ($archivo);
      echo "</div>";
      echo "<div class='ranking2'><p class='ranking'><a>Ranking</a></p>";
      $archivo = fopen ("records.txt","r");
      $numLineas = 0;
      while (!feof($archivo)) {
        $linea = fgets($archivo);
        if(++$numLineas > 5 && $numLineas < 11){
          echo "<p class='posiciones'>$linea</p>";
        }
      }
      fclose ($archivo);
      echo "</div>";
      $auxiliarCookyServer = $_SESSION['imgServerSession'];

      echo "<div id='cartaS' data-gafas='".$auxiliarCookyServer[1]."' data-pelo='".$auxiliarCookyServer[2]."'data-genero='".$auxiliarCookyServer[3]."' class='cartaServer'>";
          echo "<a href='Index.php'><div class='frontalServer'><img src='imagenes/back_img.jpg'></div></a>";
          echo "<div class='traseraServer'><img src='imagenes/".$_SESSION["imgServerSession"][0]."'></div>";
      echo "</div>";
    echo "</div>";
    echo "<div class='contenido'>";
    //Contenedor con tabla para las cartas del Cliente
    echo "<div class ='contenedorCartasCliente' class= 'cartasCliente'\n>";
    echo "<table class='table' id='tablacartas'>\n";
    //Shuffle del Array de $imgAtributo sin repeticiones
    //$c para diferenciar id's y que no se repitan
      shuffle($imgAtributo);
      if (!isset($_SESSION['imgClienteSession'])) {
          $_SESSION['imgClienteSession'] = $imgAtributo;
        }
      for ($i=0; $i < 4; $i++) {
        echo "<tr>";
        for ($j=0; $j < 3;  $j++) {

          $auxiliarCooky = $_SESSION['imgClienteSession'];
          echo "<td>";
            echo "<div id='carta$c' data-gafas='".$auxiliarCooky[$c][1]."' data-pelo='".$auxiliarCooky[$c][2]."' data-genero='".$auxiliarCooky[$c][3]."' class='cartaCliente chosenOne' onclick='abrirModal()'>";
              echo "<div class='frontal BN' ><img src='imagenes/".$_SESSION['imgClienteSession'][$c][0]."'></div>";
              echo "<div class='trasera BN'><img src='imagenes/back_img.jpg'></div>";
            echo "</div>";
          echo "</td>";
          $c++;
        }
        echo "</tr>";
      }
      echo "</table></div>";
      echo "<div class='contenedorCombo'>";
      echo "<h2 id='validacion'></h2><img id='iconoVerde' class='blink_me' style='visibility: hidden' src='imagenes/greenIcon.png'><img id='iconoRojo' class='blink_me' style='visibility: hidden' src='imagenes/redIcon.png'>";
      echo "<h2>Preguntas</h2>";
      echo "<div class='combo1'>
          <select id='pelo'>
          <option value='null'></option>
          <option value='rubio'>El color del pelo es rubio?</option>
          <option value='moreno'>El color del pelo es Moreno?</option>
          <option value='negro'>El color del pelo es Negro?</option>
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
      echo "<input type='button' value='Preguntar' onclick='abrirModal()'></input>";
      echo "<input id='easyButon' class='easy' type='button' value='EASY' onclick='abrirModal()' ></input>";
      echo "<div class='contador'><p>NºPreguntes:</p><p id='contadorPreguntas'>0</p></div>";
      echo "</div>";
      echo "</div>";
      //--------------------------------------------------------------------------------------------------
      //Modal
      echo "<div id='myModal' class='modal'>
          <div class='modal-content'>
            <a href='killSession.php'><span class='close' onclick='abrirModal()'>&times;</span></a>
            <h1 id='resultado'></h1>
            <a id='reiniciarPartida' href='killSession.php'><input type='button' value='Reiniciar'></input></a>
          </div>
        </div>";
     ?>
  </body>
</html>
