//Todos los botones con la clase show-hide
let button = document.getElementsByClassName("show-hide");

// To array
button = Array.from(button);

//Por cada clase show-hide, se agrega un evento click que muestra o esconde el siguiente elemento hermano(tablero)
if (window.addEventListener) {
    button.forEach((el) => el.addEventListener("click", showHide));
} else {
    button.forEach((el) => el.attachEvent("onclick", showHide));
}

//Funcion show-hide para mostrar y ocultar tablero
function showHide(event) {
    let x = event.target.nextElementSibling;
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}
