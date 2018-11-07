//--------------------------------------------------------------------------------------
//Modal

function abrirModal(resultado) {
  var modal = document.getElementById('myModal');
  document.getElementById('resultado').innerHTML = "Oof!!!! Lo has ROTO!!!!";
    modal.style.display = "block";
}

function cerrarModal() {
  var modal = document.getElementById('myModal');
  modal.style.display = "none";
}
