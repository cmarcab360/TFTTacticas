//Fetch para obtener los datos de la API equipos META y pegarle las imagenes de los campeones
fetch("http://127.0.0.1:8000/api/meta_teams")
    .then((response) => response.json())
    .then((data) => {
        //Le añado a cada equipo su porcentaje de victorias para después ordenarlos
        data.forEach((team) => {
            team.percentage = Math.round(
                (team.victories / team.num_match) * 100
            );
        });

        //Ordenado de los equipos por la relación de victorias por número de partidos
        data.sort(comparar);
        console.log(data);

        //Creación de la lista con los datos de los equipos
        let contenedor = document.getElementById("listadoMeta");

        //Creación de la lista con los datos de los equipos
        let contador = 1;
        data.forEach((team) => {
            let equipo = document.createElement("div");
            equipo.classList.add("menu__list__equipo");
            let ranking = document.createElement("div");
            ranking.classList.add("menu__list__equipo__ranking");

            ranking.innerHTML = contador+"º";
            contador++;
            
            equipo.appendChild(ranking);

            let imagenes = document.createElement("div");
            imagenes.classList.add("menu__list__equipo__imagenes");

            //Recorrido de las lineas de equipo para sacar el character_id y poder sacar la imagen
            team.teamrow.forEach((row) => {
                let img = document.createElement("img");
                img.classList.add("menu__list__equipo__imagenes__img");
                let champion = row.character_id.toLowerCase();
                img.src = `https://raw.communitydragon.org/latest/game/assets/characters/${champion}/hud/${champion}_square.tft_set10.png`;
                imagenes.appendChild(img);
            });
            equipo.appendChild(imagenes);
            contenedor.appendChild(equipo);
        });
    })
    .catch((error) => console.error(error));

//Mostrar el menú de los equipos u ocultarlo
// Obtenemos el botón y la lista del menú
const toggleButton = document.getElementById('toggleButton');
const menuList = document.querySelector('#listadoMeta');

// Función para mostrar u ocultar la lista del menú
function toggleMenu() {
    if (menuList.style.display === 'flex') {
        menuList.style.display = 'none';
        toggleButton.innerHTML="<i class='fa-solid fa-plus'></i>";
    } else {
        menuList.style.display = 'flex';
        toggleButton.innerHTML="<i class='fa-solid fa-minus'></i>";
    }
}

// Agregamos un evento de clic al botón para llamar a la función toggleMenu
toggleButton.addEventListener('click', toggleMenu);



// Función de comparación para ordenar los equipos por la relación de victorias por número de partidos
function comparar(a, b) {
    return b.percentage - a.percentage;
}
