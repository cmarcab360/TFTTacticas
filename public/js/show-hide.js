// Seleccionar todos los elementos con la clase show-hide
const buttons = document.querySelectorAll(".show-hide");

// Convertir la NodeList a un array
const buttonArray = Array.from(buttons);

// Para cada botón con la clase show-hide, agregar un evento click que muestra u oculta el elemento asociado
buttonArray.forEach((button) => button.addEventListener("click", toggleTablero));

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