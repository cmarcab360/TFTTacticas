const url =
    "https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/en_gb/v1/tftchampions.json";


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
            contenedor.forEach((campeon) => {
                const img = document.createElement("img");
                img.src = `https://raw.communitydragon.org/latest/game/assets/characters/tft10_${campeon
                    .replace(/[^a-zA-Z0-9]/g, "")
                    .toLowerCase()}/hud/tft10_${campeon
                    .replace(/[^a-zA-Z0-9]/g, "")
                    .toLowerCase()}_square.tft_set10.png`;
                img.alt = `${campeon}`;
                img.id = campeon;
                img.style.width = "30px";
                img.style.height = "30px";
            });
 });}

 mostrarDatosApi();