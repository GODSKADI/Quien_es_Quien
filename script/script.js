//funcion que se le pasa un parametro (el num de id) para diferenciar id's.
//funcion que hace girar las cartas del cliente y se bloquean para no poder girarlas de nuevo.
//Ademas llama a la funcion coprovarCartasGiradas().
$numCartasGiradas = 0;
var contadorPregunta = 0;
function girarCartas(c) {
    var idCarta = document.getElementById("carta"+c+"");
    if($numCartasGiradas != 11){
      idCarta.classList.toggle("girada");
      idCarta.classList.remove("chosenOne");
      idCarta.removeAttribute("onclick");
      $numCartasGiradas++
    }
    coprovarCartasGiradas();
}
function preguntaServidor() {
  var idComboPelo = document.getElementById('pelo');
  var idComboSexo = document.getElementById('sexo');
  var idComboGafas = document.getElementById('gafas');
  var Vgafas = document.getElementById("cartaS").dataset.gafas;
  var Vgenero =document.getElementById("cartaS").dataset.genero;
  var Vpelo =document.getElementById("cartaS").dataset.pelo;
  //return idComboGafas.value;
  /*-------------------------------------------------------------*/
  /*Combo box Gafas*/
  if(idComboGafas.value=="gafas"){
    if(Vgafas=="si"){

      document.getElementById('iconoVerde').style.visibility = "visible";
return "El servidor contesta :<br>¿Tiene Gafas? Si";
    }else{

      document.getElementById('iconoRojo').style.visibility = "visible";
      return "El servidor contesta :<br>¿Tiene Gafas? No";

    }
  }else if(idComboGafas.value=="no_gafas"){
    if(Vgafas=="no"){

      document.getElementById('iconoVerde').style.visibility = "visible";
return "El servidor contesta :<br>¿No tiene Gafas? Si";
    }else{

      document.getElementById('iconoRojo').style.visibility = "visible";
return "El servidor contesta :<br>¿No Tiene Gafas? No";
    }
  }
  /*------------------------------------------------------------*/
  /*Combo box Genero*/
  if(idComboSexo.value=="hombre"){
    if(Vgenero=="home"){

      document.getElementById('iconoVerde').style.visibility = "visible";
return "El servidor contesta :<br>¿Es hombre? Si";
    }else{

      document.getElementById('iconoRojo').style.visibility = "visible";
return "El servidor contesta :<br>¿Es Hombre? No";
    }
  }else if (idComboSexo.value=="mujer") {
    if(Vgenero=="dona"){

      document.getElementById('iconoVerde').style.visibility = "visible";
  return "El servidor contesta :<br>¿Es Mujer? Si";
    }else{

      document.getElementById('iconoRojo').style.visibility = "visible";
return "El servidor contesta :<br>¿Es Mujer? No";
    }
  }
  /*------------------------------------------------------------*/
  /*Combo box Pelo*/
  if(idComboPelo.value=="rubio"){
    if(Vpelo=="ros"){
      document.getElementById('iconoVerde').style.visibility = "visible";
      return "El servidor contesta :<br>¿El color del Pelo es rubio? Si";

    }else {
      document.getElementById('iconoRojo').style.visibility = "visible";
      return "El servidor contesta :<br>¿El color del Pelo es rubio? No";

    }
  }else if (idComboPelo.value=="moreno") {
    if (Vpelo=="castany") {
        document.getElementById('iconoVerde').style.visibility = "visible";
      return "El servidor contesta :<br>¿El color del Pelo es moreno? Si";

    } else {
      document.getElementById('iconoRojo').style.visibility = "visible";
      return "El servidor contesta :<br>¿El color del Pelo es moreno? No";

    }
  }else if (idComboPelo.value=="negro") {
    if (Vpelo=="negre") {
      document.getElementById('iconoVerde').style.visibility = "visible";
      return "El servidor contesta :<br>¿El color del Pelo es negro? Si";

    } else {
      document.getElementById('iconoRojo').style.visibility = "visible";
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
  document.getElementById('iconoRojo').style.visibility = "hidden";
  document.getElementById('iconoVerde').style.visibility = "hidden";
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
    idValidacion.style.color = "white";
    contadorPregunta++;
    document.getElementById('contadorPreguntas').innerHTML = contadorPregunta;
    //alert(contadorPregunta);

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
  var idCartaServer = document.getElementById("cartaS");
  idCartaServer.classList.toggle("girada");
  comprovarCartas();
}

function comprovarCartas(){
  var srcCartaServer = document.getElementById('cartaS').childNodes[1].firstChild.src;
  var CartaCliente = document.getElementsByClassName('chosenOne')[0];
  var srcCartaCliente = CartaCliente.childNodes[0].firstChild.src;
  if(srcCartaServer == srcCartaCliente){
    abrirModal("HAS GANADO");
  }else{
    abrirModal("HAS PERDIDO");
  }
}

//--------------------------------------------------------------------------------------
//Modal

function abrirModal(resultado) {
  var modal = document.getElementById('myModal');
  document.getElementById('resultado').innerHTML = resultado;
    modal.style.display = "block";
    if(resultado == "HAS PERDIDO"){
      document.getElementById('guardarRecord').style.display = 'none';
      document.getElementById('reiniciarPartida').style.visibility = "visible";
    }
}

function abrirNombre(){
  document.getElementById('guardarNombre').style.visibility = "visible";
}

function cerrarModal() {
  var modal = document.getElementById('myModal');
  modal.style.display = "none";
}
/*
window.onclick = function(event) {
  var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
*/
