//funcion que se le pasa un parametro (el num de id) para diferenciar id's.
//funcion que hace girar las cartas del cliente y se bloquean para no poder girarlas de nuevo.
//Ademas llama a la funcion coprovarCartasGiradas().
$numCartasGiradas = 0;

function girarCartas(c) {
    var idCarta = document.getElementById("carta"+c+"");
    if($numCartasGiradas != 11){
      idCarta.classList.toggle("girada");
      idCarta.removeAttribute("onclick");
      $numCartasGiradas++
    }
    coprovarCartasGiradas();
}
function preguntaServidor() {
  return "ere tonto";
}
//Funcion que valida que se hagan las preguntas con ciertas reglas.
function validar(){
  var idComboPelo = document.getElementById('pelo');
  var idComboSexo = document.getElementById('sexo');
  var idComboGafas = document.getElementById('gafas');
  var idValidacion = document.getElementById('validacion');
  if(idComboPelo.value != "null" && idComboSexo.value != "null" || idComboPelo.value != "null" && idComboGafas.value != "null" || idComboSexo.value != "null" && idComboGafas.value != "null"){
    idValidacion.innerHTML = "Error: estas haciendo 2 o más preguntas a la vez.";
    idComboPelo.value = "null";
    idComboSexo.value = "null";
    idComboGafas.value = "null";
  }else if(idComboPelo.value == "null" && idComboSexo.value == "null" && idComboGafas.value == "null"){
    idValidacion.innerHTML = "No estas haciendo ninguna pregunta.";
  }else{
    /*idValidacion.innerHTML = "cosas para el bot";*/
    idValidacion.innerHTML = preguntaServidor();

  }
  if(document.getElementById('easyButon').disabled == false){
    document.getElementById('easyButon').style.visibility = "hidden";
  }

}
function easyMode(){
  document.getElementById('easyButon').disabled = true;
}

//Funcion que comprueva que hay 11 cartas dadas la vuelta.
function coprovarCartasGiradas(){
  var cartasGiradas = document.getElementsByClassName('girada');
  if(cartasGiradas.length == 11){
    girarCartaServer();
  }
}

//Funcion que gira la carta del servidor.
function girarCartaServer(){
  alert("tachan!!!");
  var idCartaServer = document.getElementById("cartaS");
  alert(idCartaServer);
  idCartaServer.classList.toggle("girada");
}
//--------------------------------------------------------------------------------------
//Fuegos Artificiales
