//funcion que se le pasa un parametro (el num de id) para diferenciar id's.
//funcion que hace girar las cartas del cliente y se bloquean para no poder girarlas de nuevo.
//Ademas llama a la funcion coprovarCartasGiradas().
var GlobalMode = 0;
var contadorPreguntas = 0;
var contPregsSinReinicio = 0;

var numCartasGiradas = 0;
var contadorPregunta = 0;
var sonidoGirarCarta = new Audio('sonidos/giro.mp3');
function girarCartas(c) {
    var idCarta = document.getElementById("carta"+c+"");
    if(numCartasGiradas != 11){
      idCarta.classList.toggle("girada");
      idCarta.classList.remove("chosenOne");
      idCarta.removeAttribute("onclick");
      sonidoGirarCarta.play();
      numCartasGiradas++
      contadorPreguntas = 0;
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
  if(contPregsSinReinicio > 2){
    contadorPreguntas = 0;
  }
  if(contadorPreguntas == 0){
    if(idComboGafas.value=="gafas"){
      if(Vgafas=="si"){
        document.getElementById('iconoVerde').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("gafas","si","0");
        }
        return "El servidor contesta :<br>¿Tiene Gafas? Si";
      }else{
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("gafas","no","0");
        }
        return "El servidor contesta :<br>¿Tiene Gafas? No";
      }
    }else if(idComboGafas.value=="no_gafas"){
      if(Vgafas=="no"){
        document.getElementById('iconoVerde').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("no_gafas","si","0");
        }
        return "El servidor contesta :<br>¿No tiene Gafas? Si";
      }else{
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("no_gafas","no","0");
        }
        return "El servidor contesta :<br>¿No Tiene Gafas? No";
      }
    }
    /*------------------------------------------------------------*/
    /*Combo box Genero*/
    if(idComboSexo.value=="hombre"){
      if(Vgenero=="home"){
        document.getElementById('iconoVerde').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("genero","home","si");
        }
        return "El servidor contesta :<br>¿Es hombre? Si";
      }else{
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("genero","dona","si");
        }
        return "El servidor contesta :<br>¿Es Hombre? No";
      }
    }else if (idComboSexo.value=="mujer") {
      if(Vgenero=="dona"){
        document.getElementById('iconoVerde').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("genero","dona","si");
        }
        return "El servidor contesta :<br>¿Es Mujer? Si";
      }else{
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("genero","home","si");
        }
        return "El servidor contesta :<br>¿Es Mujer? No";
      }
    }
    /*------------------------------------------------------------*/
    /*Combo box Pelo*/
    if(idComboPelo.value=="rubio"){
      if(Vpelo=="ros"){
        document.getElementById('iconoVerde').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("pelo","rubio","si");
        }
        return "El servidor contesta :<br>¿El color del Pelo es rubio? Si";

      }else {
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("pelo","rubio","no");
        }
        return "El servidor contesta :<br>¿El color del Pelo es rubio? No";

      }
    }else if (idComboPelo.value=="moreno") {
      if (Vpelo=="castany") {
          document.getElementById('iconoVerde').style.visibility = "visible";
          contadorPreguntas++;
          contPregsSinReinicio++;
          if(GlobalMode ==1){
            voltearModoEasy("pelo","moreno","si");
          }
          return "El servidor contesta :<br>¿El color del Pelo es moreno? Si";
      } else {
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("pelo","moreno","no");
        }
        return "El servidor contesta :<br>¿El color del Pelo es moreno? No";
      }
    }else if (idComboPelo.value=="negro") {
      if (Vpelo=="negre") {
        document.getElementById('iconoVerde').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("pelo","negro","si");
        }
        return "El servidor contesta :<br>¿El color del Pelo es negro? Si";
      } else {
        document.getElementById('iconoRojo').style.visibility = "visible";
        contadorPreguntas++;
        contPregsSinReinicio++;
        if(GlobalMode ==1){
          voltearModoEasy("pelo","negro",no);
        }
        return "El servidor contesta :<br>¿El color del Pelo es negro? No";
      }
    }
  }else if(contPregsSinReinicio < 2){
      contadorPreguntas = 0;
      contPregsSinReinicio++;
      contadorPregunta--;
      return "Seguro que quieres realizar otra pregunta sin girar ninguna carta?";
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
    document.form.contadorPregunta.value = contadorPregunta;
    //alert(contadorPregunta);

  }
  if(document.getElementById('easyButon').disabled == false){
    document.getElementById('easyButon').style.visibility = "hidden";
  }

}
function easyMode(){
  GlobalMode =1;
  document.getElementById('easyButon').disabled = true;
  contPregsSinReinicio = 3;
  var tablero = document.getElementsByClassName("cartaCliente");
  for (var i = 0; i < tablero.length; i++) {
      tablero[i].removeAttribute("onclick");
  }
}
function voltearModoEasy(tipo,condicion,condicion2){
  var tablero = document.getElementsByClassName("chosenOne");
  if("genero"==tipo){
    for (var i = 0; i < tablero.length; i++) {
      var aux = tablero[i].dataset.genero;
        alert("Genero "+aux+" "+condicion);
      if(aux != condicion){
        alert(aux+" "+condicion);
        tablero[i].classList.toggle("girada");
        tablero[i].classList.remove("chosenOne");
        numCartasGiradas++;
      }
    }
  }
  if("gafas"==tipo){
    for (var i = 0; i < tablero.length; i++) {
      var aux = tablero[i].dataset.gafas;
        alert("Gafas "+aux+" "+condicion);
      /*if(aux != condicion){
        alert(aux+" "+condicion);
        tablero[i].classList.toggle("girada");
        tablero[i].classList.remove("chosenOne");
        numCartasGiradas++;
      }*/
    }
  }
  /*if("pelo"==tipo){
    for (var i = 0; i < tablero.length; i++) {
      var aux = tablero[i].dataset.pelo;
        alert("Pelo "+aux+" "+condicion+" "+condicion2);
      if(condicion2==no){
        if(aux == condicion){
          alert("no: "+aux+" "+condicion);
          tablero[i].classList.toggle("girada");
          tablero[i].classList.remove("chosenOne");
          numCartasGiradas++;
        }
      }else{
        if(aux!=condicion){
          alert("si: "+aux+" "+condicion);
          tablero[i].classList.toggle("girada");
          tablero[i].classList.remove("chosenOne");
          numCartasGiradas++;
        }
      }

    }
  }*/

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
//var SonidoGanar = new Audio();
//var SonidoPerder = new Audio();
function comprovarCartas(){
  var srcCartaServer = document.getElementById('cartaS').childNodes[1].firstChild.src;
  var CartaCliente = document.getElementsByClassName('chosenOne')[0];
  var srcCartaCliente = CartaCliente.childNodes[0].firstChild.src;
  if(srcCartaServer == srcCartaCliente){
    abrirModal("HAS GANADO");
    //SonidoGanar.play();
  }else{
    abrirModal("HAS PERDIDO");
    //SonidoPerder.play();
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
