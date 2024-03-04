<?php
use Illuminate\Support\Str; 
?>
<x-layout>

<!--Bucle que muestra los equipos que has creado en tu perfil (en curso)-->

    <x-header />

    <style>
        .casillaPrimeraFila,
        .casillaSegundaFila,
        .casillaTerceraFila,
        .casillaCuartaFila {
            border: solid #000a11 0.2000rem;
            width: 30px;
            height: 30px;
        }

        .casillaInvisible {
            width: 15px;
            height: 0px;
        }

        .tablero {
            display: none;
        }
    </style>
    <!--Bucle que muestra los equipos META (en curso)-->
    <section class="teamsMeta">
        @foreach($metaTeams as $team)
        <div id="teamMeta{{$team->id}}">
            <div>
                <p>{{ $team->team_name }}</p>
                <p>{{ $team->num_match != 0 ? round($team->victories / $team->num_match * 100) : "0" }}%</p>
            </div>
            <div>
                @foreach($team->teamrow as $row)
                <img src="https://raw.communitydragon.org/latest/game/assets/characters/{{Str::of($row->character_id)->lower()}}/hud/{{Str::of($row->character_id)->lower()}}_square.tft_set10.png" alt="Champion {{Str::of($row->character_id)->substr(6)}}" title="{{Str::of($row->character_id)->substr(6)}}">
                {{Str::of($row->character_id)->substr(6)}}
                @endforeach
            </div>
            @if(session('admin') == 1)
                <form action="/profile" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="team_id" value="{{$team->id}}">
                    <input type="submit" value="Eliminar equipo">
                </form>
            @endif
            <button class='show-hide'>^</button>
            <div class="tablero" id="tablero{{$team->id}}">
                <section class="primeraFila">
                    <img class="casillaPrimeraFila" id="casilla1" src="" alt="">
                    <img class="casillaPrimeraFila" id="casilla2" src="" alt="">
                    <img class="casillaPrimeraFila" id="casilla3" src="" alt="">
                    <img class="casillaPrimeraFila" id="casilla4" src="" alt="">
                    <img class="casillaPrimeraFila" id="casilla5" src="" alt="">
                    <img class="casillaPrimeraFila" id="casilla6" src="" alt="">
                    <img class="casillaPrimeraFila" id="casilla7" src="" alt="">
                    <img class="casillaInvisible" src="" alt="">
                </section>
                <section class="segundaFila">
                    <img class="casillaInvisible" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla8" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla9" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla10" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla11" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla12" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla13" src="" alt="">
                    <img class="casillaSegundaFila" id="casilla14" src="" alt="">
                </section>
                <section class="terceraFila">
                    <img class="casillaTerceraFila" id="casilla15" src="" alt="">
                    <img class="casillaTerceraFila" id="casilla16" src="" alt="">
                    <img class="casillaTerceraFila" id="casilla17" src="" alt="">
                    <img class="casillaTerceraFila" id="casilla18" src="" alt="">
                    <img class="casillaTerceraFila" id="casilla19" src="" alt="">
                    <img class="casillaTerceraFila" id="casilla20" src="" alt="">
                    <img class="casillaTerceraFila" id="casilla21" src="" alt="">
                    <img class="casillaInvisible" src="" alt="">
                </section>
                <section class="cuartaFila">
                    <img class="casillaInvisible" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla22" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla23" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla24" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla25" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla26" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla27" src="" alt="">
                    <img class="casillaCuartaFila" id="casilla28" src="" alt="">
                </section>
            </div>
        </div>
        @endforeach
    </section>

    <!--Linea temporal de separación-->
    <span>------------------------------------------------------------------------------------------</span>
    <!--Boton crear equipo-->
    <button><a href="/createTeam"> Crear equipo</a></button>

    <!--Bucle que muestra los equipos que has creado en tu perfil-->

    <section class="myTeams">
        @foreach($teams as $team)
            <div class="myTeam">
                <div>
                    <p>{{ $team->team_name }}</p>
                    <p>{{ $team->num_match != 0 ? round($team->victories / $team->num_match * 100) : "0" }}%</p>
                </div>
                <div>
                    @foreach($team->teamrow as $row)
                        <img src="https://raw.communitydragon.org/latest/game/assets/characters/{{Str::of($row->character_id)->lower()}}/hud/{{Str::of($row->character_id)->lower()}}_square.tft_set10.png" alt="Champion {{Str::of($row->character_id)->substr(6)}}" title="{{Str::of($row->character_id)->substr(6)}}">
                        {{Str::of($row->character_id)->substr(6)}}
                    @endforeach
                </div>
                <div class="tablero" id="tablero{{$team->id}}">
                    <section class="primeraFila">
                        <img class="casillaPrimeraFila" id="casilla1" src="" alt="">
                        <img class="casillaPrimeraFila" id="casilla2" src="" alt="">
                        <img class="casillaPrimeraFila" id="casilla3" src="" alt="">
                        <img class="casillaPrimeraFila" id="casilla4" src="" alt="">
                        <img class="casillaPrimeraFila" id="casilla5" src="" alt="">
                        <img class="casillaPrimeraFila" id="casilla6" src="" alt="">
                        <img class="casillaPrimeraFila" id="casilla7" src="" alt="">
                        <img class="casillaInvisible" src="" alt="">
                    </section>
                    <section class="segundaFila">
                        <img class="casillaInvisible" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla8" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla9" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla10" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla11" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla12" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla13" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla14" src="" alt="">
                    </section>
                    <section class="terceraFila">
                        <img class="casillaTerceraFila" id="casilla15" src="" alt="">
                        <img class="casillaTerceraFila" id="casilla16" src="" alt="">
                        <img class="casillaTerceraFila" id="casilla17" src="" alt="">
                        <img class="casillaTerceraFila" id="casilla18" src="" alt="">
                        <img class="casillaTerceraFila" id="casilla19" src="" alt="">
                        <img class="casillaTerceraFila" id="casilla20" src="" alt="">
                        <img class="casillaTerceraFila" id="casilla21" src="" alt="">
                        <img class="casillaInvisible" src="" alt="">
                    </section>
                    <section class="cuartaFila">
                        <img class="casillaInvisible" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla22" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla23" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla24" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla25" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla26" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla27" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla28" src="" alt="">
                    </section>
                </div>
                <form action="/profile" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="number" name="victories" value="{{$team->victories}}">
                    <input type="number" name="num_match" value="{{$team->num_match}}">
                    <input type="hidden" name="team_id" value="{{$team->id}}">
                    <input type="submit" value="Modificar">
                </form>
                <form action="/profile" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="team_id" value="{{$team->id}}">
                    <input type="submit" value="Eliminar equipo">
                </form>
                <button class='show-hide'>^</button>
            </div>
        @endforeach
    </section>
    
    <!--Propagación de id usuario y si es admin-->
    <p>Id usuario:{{session('user_id')}}</p>
    <p>Admin:{{session('admin')}}</p>


    <!--Script-->
    <script>
        const url =
            "https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/en_gb/v1/tftchampions.json";

        document.addEventListener("DOMContentLoaded", function () {
            function mostrarDatosApi() {
                fetch(url)
                    .then((data) => data.json())
                    .then((data2) => {

                        //console.log(data2);

                        const contenedor = [];
                        const uniqueDisplayNames = new Set();

                        for (let i = 0; i < data2.length; i++) {
                            if (
                                data2[i].character_record.character_id.startsWith(
                                    "TFT10_"
                                )
                            ) {
                                const displayName =
                                    data2[i].character_record.display_name;

                                // Verificar si el nombre ya está en el Set
                                if (
                                    uniqueDisplayNames.has(displayName) ||
                                    data2[i].character_record.display_name ===
                                    "Hexcore" ||
                                    data2[i].character_record.display_name ===
                                    "GnarBig" ||
                                    data2[i].character_record.display_name ===
                                    "LuluPolymorphCritter" ||
                                    data2[i].character_record.display_name ===
                                    "Tentacle" ||
                                    data2[i].character_record.display_name ===
                                    "The Dreadsteed" ||
                                    data2[i].character_record.display_name ===
                                    "SightWard"
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

                        @foreach($teams as $row)
                        var tableros = document.getElementById("tablero" + {{ $row->id}});
                         console.log(tableros);
                        

                        var teamRows = <?php    echo json_encode($teamRows); ?>;
                         console.log(teamRows);

                for (let i = 0; i < teamRows.length; i++) {
                for (let child of tableros.children) {
                    for (let img of child.children) {
                        if (img.id === "casilla" + teamRows[i].position && teamRows[i].team_id === {{ $row->id }}) {
                            img.src = "https://raw.communitydragon.org/latest/game/assets/characters/tft10_" + teamRows[i].character_id.substr(6).toLowerCase() + "/hud/tft10_" + teamRows[i].character_id.substr(6).toLowerCase() + "_square.tft_set10.png";
                        }
                    }
                }
            }
            @endforeach
        });
        }
        mostrarDatosApi();
        });

    </script>

    <script src="{{ asset('js/show-hide.js') }}"></script>
    <script src="{{ asset('js/Meta.js') }}"></script>

</x-layout>