<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <?php


    //Modal
    echo "<div id='myModal' class='modal'>
        <div class='modal-content'>
          <span class='close' onclick='cerrarModal()'>&times;</span>
          <h1 id='resultado'></h1>
          <div id='guardarRecord'>
            <h3>Quieres guardar tu record?</h3>
            <input type='button' value='Si' onclick='abrirNombre()'></input>
            <input type='button' value='No' onclick='cerrarModal()'></input>
            <div id='guardarNombre' style='visibility: hidden'>
              <h3>Introduce tu Nombre:</h3>
              <input type='text'></input>
              <input type='button' value='Guardar'</input>
            </div>
          </div>
        </div>
      </div> ";
     ?>
  </body>
</html>
