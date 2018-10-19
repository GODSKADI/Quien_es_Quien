//funcion que se le pasa un parametro (el num de id) para diferenciar id's
//funcion que hace girar las cartas del cliente y se bloquean para no poder girarlas de nuevo
$numCartasGiradas = 0;

function girarCartas(c) {
    var idCarta = document.getElementById("carta"+c+"");
    if($numCartasGiradas != 11){
      idCarta.classList.toggle("girada");
      idCarta.removeAttribute("onclick");
      $numCartasGiradas++
    }
}

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
  }
}
