<?php

@session_start();


if($_POST["nombre"] != null){
  $nombre = $_POST["nombre"];
  $contadorPregunta = $_POST["contadorPregunta"];
  $fp = fopen("records.txt","a");
  fwrite($fp, "$contadorPregunta $nombre"  . PHP_EOL);
  fclose($fp);
}

session_destroy();
header("Location: index.php");
session_start();
?>
