<?php

@session_start();

echo "<p id='contadorPreguntas' hidden>&#8224;</p>";

if($_POST["nombre"] != null){
  $nombre = $_POST["nombre"];
  $fp = fopen("records.txt","a");
  fwrite($fp, "$nombre" . PHP_EOL);
  fclose($fp);
}

session_destroy();
header("Location: index.php");
session_start();
?>
