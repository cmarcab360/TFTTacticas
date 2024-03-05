// Seleccionar todos los elementos con la clase show-hide
const buttons = document.querySelectorAll(".show-hide");

// Convertir la NodeList a un array
const buttonArray = Array.from(buttons);


//Por cada clase show-hide, se agrega un evento click que muestra o esconde el siguiente elemento hermano(tablero)
if (window.addEventListener) {
    button.forEach((el) => el.addEventListener("click", showHide));
} else {
    button.forEach((el) => el.attachEvent("onclick", showHide));
}


// Función para mostrar u ocultar el elemento asociado
function toggleTablero(event) {
    // Obtener el valor del atributo data-target
    const targetId = event.target.getAttribute("data-target");

    // Obtener el elemento asociado con el ID obtenido
    const targetElement = document.getElementById(targetId);

    // Cambiar la propiedad de estilo display del elemento asociado
    if (targetElement.style.display === "block") {
        targetElement.style.display = "none";
    } else {
        targetElement.style.display = "block";
    }
}