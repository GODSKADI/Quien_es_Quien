var k = 0;

function flip() {
    var j = document.getElementById("card");
    k += 180;
    j.style.transform = "rotatey(" + k + "deg)";
    j.style.transitionDuration = "0.5s"

}
