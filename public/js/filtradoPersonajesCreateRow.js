const url =
    "https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/en_gb/v1/tftchampions.json";

window.onload = iniciar;

function iniciar() {
    contenedor = document.getElementById("contenedor");
    contenido = document.getElementById("contenido");
    positionInput = document.getElementById("position");

    /*Pruebas cross-browser
    if (window.addEventListener) {
        console.log("Funciona");
    } else {
        console.log("No funciona");
    }

    if (window.Set) {
        console.log("Funciona");
    } else {
        console.log("No funciona");
    }
    
    if (window.fetch) {
        console.log("Funciona");
    } else {
        console.log("No funciona");
    }*/
}

function mostrarDatosApi() {
    fetch(url)
        .then((data) => data.json())
        .then((data2) => {
            console.log(data2);

            const contenedor = [];
            const uniqueDisplayNames = new Set();

            for (let i = 0; i < data2.length; i++) {
                if (
                    data2[i].character_record.character_id.startsWith("TFT10_")
                ) {
                    const displayName = data2[i].character_record.display_name;

                    // Verificar si el nombre ya está en el Set
                    if (
                        uniqueDisplayNames.has(displayName) ||
                        data2[i].character_record.display_name === "Hexcore" ||
                        data2[i].character_record.display_name === "GnarBig" ||
                        data2[i].character_record.display_name ===
                            "LuluPolymorphCritter" ||
                        data2[i].character_record.display_name === "Tentacle" ||
                        data2[i].character_record.display_name ===
                            "The Dreadsteed" ||
                        data2[i].character_record.display_name === "SightWard"
                    ) {
                        continue; // Saltar a la siguiente iteración si el nombre ya está en el Set o es uno de los excluidos
                    }

                    // Agregar el nombre al Set
                    uniqueDisplayNames.add(displayName);

                    // Agregar el nombre al array contenedor
                    contenedor.push(displayName);
                }
            }

            console.log(contenedor);
            const datalist = document.getElementById("campeonesList");
            const div = document.getElementById("iconosFichas");

            // Limpiar opciones existentes
            datalist.innerHTML = "";

            // Añadir opciones al datalist
            contenedor.forEach((campeon) => {
                const option = document.createElement("option");
                option.value = campeon;
                datalist.appendChild(option);
            });

            contenedor.forEach((campeon) => {
                const img = document.createElement("img");
                img.src = `https://raw.communitydragon.org/latest/game/assets/characters/tft10_${campeon
                    .replace(/[^a-zA-Z0-9]/g, "")
                    .toLowerCase()}/hud/tft10_${campeon
                    .replace(/[^a-zA-Z0-9]/g, "")
                    .toLowerCase()}_square.tft_set10.png`;
                img.alt = `${campeon}`;
                img.id = campeon;
                img.className = "section__iconos__img";
                //añadirle tambien un evento onclick para que al hacer click en la imagen se escriba en el input del datalist el id de la imagen
                img.addEventListener("click", function () {
                    document.getElementById("character_id").value = campeon;
                    //las imagenes estan oscurecidas y cuando se hace click se iluminan a su valor original, si se hace click en otra imagen se ilumina y la anterior se oscurece. Además aparece un borde luminoso alrededor de la imagen seleccionada
                    const imagenes = document.querySelectorAll(".section__iconos__img");
                    imagenes.forEach((imagen) => {
                        imagen.style.filter = "brightness(0.4)";
                        imagen.style.boxShadow = "0 0 0px";
                    });
                    img.style.filter = "brightness(1)";
                    img.style.boxShadow = "0 0 10px rgba(255, 255, 0, 1)";
                
                });
                img.style.width = "75px";
                img.style.height = "75px";
                div.appendChild(img);
            });

            //Cuando hago click en elemento con id casilla[i] (desde casilla1 hasta casilla28), en el input hidden con id="position" se escribe el valor de i y si hago click, se hace el submit de la pagina. Cuando tengo el cursor encima de la casilla, se colorea de amarillo, y cuando lo quito, se quita el color.
            for (let i = 1; i <= 28; i++) {
                document.getElementById(`casilla${i}`).addEventListener("click", function () {
                    positionInput.value = i;
                    document.getElementById("addChamp").submit();
                });
                document.getElementById(`casilla${i}`).addEventListener("mouseover", function () {
                    document.getElementById(`casilla${i}`).style.backgroundColor = "#cff136";
                    document.getElementById(`casilla${i}`).style.borderColor = "#cff136";
                    
                });
                document.getElementById(`casilla${i}`).addEventListener("mouseout", function () {
                    document.getElementById(`casilla${i}`).style.backgroundColor = "#E0E3E4";
                    document.getElementById(`casilla${i}`).style.borderColor = "transparent";
                    
                });
            }
        });
}

mostrarDatosApi();
