const url =
    "https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/en_gb/v1/tftchampions.json";

window.onload = iniciar;

function iniciar() {
    contenido = document.getElementById("contenido");
}

function mostrarDatosApi() {
    fetch(url)
        .then((data) => data.json())
        .then((data2) => {
            console.log(data2);

            const uniqueDisplayNames = new Set();

            for (let i = 0; i < data2.length; i++) {
                if (data2[i].character_record.character_id.startsWith("TFT10_")) {
                    const displayName = data2[i].character_record.display_name;

                    // Verificar si el nombre ya está en el Set
                    if (uniqueDisplayNames.has(displayName) ||
                        data2[i].character_record.display_name === "Hexcore" ||
                        data2[i].character_record.display_name === "GnarBig" ||
                        data2[i].character_record.display_name === "LuluPolymorphCritter" ||
                        data2[i].character_record.display_name === "Tentacle" ||
                        data2[i].character_record.display_name === "The Dreadsteed" ||
                        data2[i].character_record.display_name === "SightWard") {
                        continue; // Saltar a la siguiente iteración si el nombre ya está en el Set o es uno de los excluidos
                    }
                    
                    // Agregar el nombre al Set
                    uniqueDisplayNames.add(displayName);

                    // Agregar el nombre al array contenedor

                    // Agregar el contenido al HTML
                    /*contenido.innerHTML += `
                        <p>Nombre: ${displayName}</p>
                        Imagen: <img src="https://raw.communitydragon.org/latest/game/assets/characters/tft10_${displayName.replace(/[^a-zA-Z0-9]/g, "").toLowerCase()}/hud/tft10_${displayName.replace(/[^a-zA-Z0-9]/g, "").toLowerCase()}_square.tft_set10.png" alt="">
                    `;*/
                }
            }

            console.log(contenedor);
        });
}

mostrarDatosApi();
