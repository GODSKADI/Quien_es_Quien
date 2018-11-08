
alert("Has intentado girar la carta del servidor, eso es hacer trampas. Sufriras las consequencias.");

//--------------------------------------------------------------------------------------
//Modal
var contSalirEasterEgg = 0;
function abrirModal(resultado) {
  var modal = document.getElementById('myModal');
  document.getElementById('resultado').innerHTML = "Te lo dije.";
  modal.style.display = "block";
  contSalirEasterEgg++;
  if (contSalirEasterEgg == 5){
    document.getElementById('resultado').hidden = true;
    document.getElementById('btnCerrar').hidden = true;
    document.getElementById('icnCerrar').hidden = true;
    document.getElementById('consequencias').hidden = false;
  }
}

function cerrarModal() {
  var modal = document.getElementById('myModal');
  modal.style.display = "none";
}
