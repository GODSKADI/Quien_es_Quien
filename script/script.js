//funcion que se le pasa un parametro (el num de id) para diferenciar id's
//funcion que hace girar las cartas del cliente y se bloquean para no poder girarlas de nuevo

function girarCartas(c) {
    var idCarta = document.getElementById("carta"+c+"");
    idCarta.classList.toggle("girada");
    idCarta.removeAttribute("onclick");
}
