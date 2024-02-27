let button = document.getElementsByClassName("show-hide");
// To array
button = Array.from(button);

//Por cada clase show-hide, se agrega un evento click que muestra o esconde el siguiente elemento hermano(tablero)
button.forEach((el) =>
    el.addEventListener("click", (event) => {
        let x = event.target.nextElementSibling;
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    })
);
