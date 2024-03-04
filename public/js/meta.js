//Fetch para obtener los datos de la API equipos META y pegarle las imagenes de los campeones
fetch("http://127.0.0.1:8000/api/meta_teams")
    .then((response) => response.json())
    .then((data) => {
        data.forEach((team) => {
            let tablero = document.getElementById("tablero" + team.id);
            console.log(tablero);

            team.teamrow.forEach((row) => {
                let champion = row.character_id.toLowerCase();
                let position = row.position;
                console.log('Campeon: ' + champion+' Posicion: '+position);
                
                //Recorro los hijos de ESE tablero hasta llegar al elemento imagen
                for (let child of tablero.children) {
                    for (let img of child.children) {
                        if (img.id === "casilla" + position) {
                            img.src = `https://raw.communitydragon.org/latest/game/assets/characters/${champion}/hud/${champion}_square.tft_set10.png`;
                        }
                    }
                }
            });
        });
    })
    .catch((error) => console.error(error));