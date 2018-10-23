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
  var idComboPelo = document.getElementById('pelo');
  var idComboSexo = document.getElementById('sexo');
  var idComboGafas = document.getElementById('gafas');
  var Vgafas = document.getElementById("cartaServer").dataset.gafas;
  var Vgenero =document.getElementById("cartaServer").dataset.genero;
  var Vpelo =document.getElementById("cartaServer").dataset.pelo;
  //return idComboGafas.value;
  /*-------------------------------------------------------------*/
  /*Combo box Gafas*/
  if(idComboGafas.value=="gafas"){
    if(Vgafas=="si"){
      return "El servidor contesta :<br>¿Tiene Gafas? Si";
    }else{
      return "El servidor contesta :<br>¿Tiene Gafas? No";
    }
  }else if(idComboGafas.value=="no_gafas"){
    if(Vgafas=="no"){
      return "El servidor contesta :<br>¿No tiene Gafas? Si";
    }else{
      return "El servidor contesta :<br>¿No Tiene Gafas? No";
    }
  }
  /*------------------------------------------------------------*/
  /*Combo box Genero*/
  if(idComboSexo.value=="hombre"){
    if(Vgenero=="home"){
      return "El servidor contesta :<br>¿Es hombre? Si";
    }else{
      return "El servidor contesta :<br>¿Es Hombre? No";
    }
  }else if (idComboSexo.value=="mujer") {
    if(Vgenero=="dona"){
      return "El servidor contesta :<br>¿Es Mujer? Si";
    }else{
      return "El servidor contesta :<br>¿Es Mujer? No";
    }
  }
  /*------------------------------------------------------------*/
  /*Combo box Pelo*/
  if(idComboPelo.value=="rubio"){
    if(Vpelo=="ros"){
      return "El servidor contesta :<br>¿El color del Pelo es rubio? Si";
    }else {
      return "El servidor contesta :<br>¿El color del Pelo es rubio? No";
    }
  }else if (idComboPelo.value=="moreno") {
    if (Vpelo=="castany") {
      return "El servidor contesta :<br>¿El color del Pelo es moreno? Si";
    } else {
      return "El servidor contesta :<br>¿El color del Pelo es moreno? No";
    }
  }else if (idComboPelo.value=="negro") {
    if (Vpelo=="negre") {
      return "El servidor contesta :<br>¿El color del Pelo es negro? Si";
    } else {
      return "El servidor contesta :<br>¿El color del Pelo es negro? No";
    }
  }
}
//Funcion que valida que se hagan las preguntas con ciertas reglas.
function validar(){
  var idComboPelo = document.getElementById('pelo');
  var idComboSexo = document.getElementById('sexo');
  var idComboGafas = document.getElementById('gafas');
  var idValidacion = document.getElementById('validacion');
  if(idComboPelo.value != "null" && idComboSexo.value != "null" || idComboPelo.value != "null" && idComboGafas.value != "null" || idComboSexo.value != "null" && idComboGafas.value != "null"){
    idValidacion.innerHTML = "Error: estas haciendo 2 o más preguntas a la vez.";
    idValidacion.style.color = "red";
    idComboPelo.value = "null";
    idComboSexo.value = "null";
    idComboGafas.value = "null";
  }else if(idComboPelo.value == "null" && idComboSexo.value == "null" && idComboGafas.value == "null"){
    idValidacion.innerHTML = "No estas haciendo ninguna pregunta.";
    idValidacion.style.color = "red";
  }else{
    /*idValidacion.innerHTML = "cosas para el bot";*/
    idValidacion.innerHTML = preguntaServidor();
    idValidacion.style.color = "green";

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
