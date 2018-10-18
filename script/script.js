

function flip(c) {
    var idCarta = document.getElementById("carta"+c+"");
    idCarta.classList.toggle("flipped");
    idCarta.removeAttribute("onclick");
}
