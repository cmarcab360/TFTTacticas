<?php
use Illuminate\Support\Str;
?>
<x-layout>

    <x-header />

    <!--Bucle que muestra los equipos META (en curso)-->
    <section class="seccion">
        <h1 class="seccion__titulo">Meta Teams</h1>
        @foreach ($metaTeams as $team)
            <seccion id="teamMeta{{ $team->id }}" class="caja">
                <article class="caja__datos">
                    <p class="caja__datos__nombre">{{ $team->team_name }}</p>
                    <p class="caja__datos__victorias">
                        {{ $team->num_match != 0 ? round(($team->victories / $team->num_match) * 100) : '0' }}%<i
                            class="fa-solid fa-trophy"></i></p>
                </article>
                <section class="caja__personajes">
                    @foreach ($team->teamrow as $row)
                        <article class="caja__personajes__personaje">
                            <img class="caja__personajes__personaje__imagen"
                                src="https://raw.communitydragon.org/latest/game/assets/characters/{{ Str::of($row->character_id)->lower() }}/hud/{{ Str::of($row->character_id)->lower() }}_square.tft_set10.png"
                                alt="Champion {{ Str::of($row->character_id)->substr(6) }}"
                                title="{{ Str::of($row->character_id)->substr(6) }} ">
                            <p class="caja__personajes__personaje__nombre">{{ Str::of($row->character_id)->substr(6) }}
                            </p>
                        </article>
                    @endforeach
                </section>
                @if (session('admin') == 1)
                    <form action="/profile" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                        <button type="submit" class="caja__button--orange"><i
                                class="fa-regular fa-trash-can"></i></button>
                    </form>
                @endif

                <button class='show-hide caja__button--blue' data-target="tablero{{ $team->id }}">+</button>

            </seccion>

            <section class="box">
                <aside class="tablero" id="tablero{{ $team->id }}">
                    <section class="primeraFila">
                        <img class="casillaPrimeraFila" id="casilla1" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla2" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla3" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla4" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla5" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla6" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla7" src="/img/blanco.png" alt="">
                        <img class="casillaInvisible" src="" alt="">
                    </section>
                    <section class="segundaFila">
                        <img class="casillaInvisible" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla8" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla9" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla10" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla11" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla12" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla13" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla14" src="/img/blanco.png" alt="">
                    </section>
                    <section class="terceraFila">
                        <img class="casillaTerceraFila" id="casilla15" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla16" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla17" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla18" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla19" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla20" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla21" src="/img/blanco.png" alt="">
                        <img class="casillaInvisible" src="" alt="">
                    </section>
                    <section class="cuartaFila">
                        <img class="casillaInvisible" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla22" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla23" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla24" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla25" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla26" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla27" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla28" src="/img/blanco.png" alt="">
                    </section>
                </aside>
            </section>
        @endforeach

        <!--Bucle que muestra los equipos que has creado en tu perfil-->
        <h1 class="seccion__titulo">Your teams</h1>
        @foreach ($teams as $team)
            <secction class="caja" id="myTeam">
                <article class="caja__datos">
                    <p class="caja__datos__nombre">{{ $team->team_name }}</p>
                    <p class="caja__datos__victorias">
                        {{ $team->num_match != 0 ? round(($team->victories / $team->num_match) * 100) : '0' }}%<i
                            class="fa-solid fa-trophy"></i></p>
                </article>
                <section class="caja__personajes">
                    @foreach ($team->teamrow as $row)
                        <article class="caja__personajes__personaje">
                            <img class="caja__personajes__personaje__imagen"
                                src="https://raw.communitydragon.org/latest/game/assets/characters/{{ Str::of($row->character_id)->lower() }}/hud/{{ Str::of($row->character_id)->lower() }}_square.tft_set10.png"
                                alt="Champion {{ Str::of($row->character_id)->substr(6) }}"
                                title="{{ Str::of($row->character_id)->substr(6) }}">
                            <p class="caja__personajes__personaje__nombre">
                                {{ Str::of($row->character_id)->substr(6) }}
                            </p>
                        </article>
                    @endforeach
                </section>
                <form action="/profile" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                    <button type="submit" class="caja__button--orange"><i
                            class="fa-regular fa-trash-can"></i></button>
                </form>
                <button class='show-hide caja__button--blue' class='show-hide'
                    data-target="tablero{{ $team->id }}">+</button>
            </secction>
            <section class="box">
                <aside class="tablero" id="tablero{{ $team->id }}">
                    <section class="primeraFila" class="caja__personajes">
                        <img class="casillaPrimeraFila" id="casilla1" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla2" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla3" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla4" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla5" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla6" src="/img/blanco.png" alt="">
                        <img class="casillaPrimeraFila" id="casilla7" src="/img/blanco.png" alt="">
                        <img class="casillaInvisible" src="" alt="">
                    </section>
                    <section class="segundaFila">
                        <img class="casillaInvisible" src="" alt="">
                        <img class="casillaSegundaFila" id="casilla8" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla9" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla10" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla11" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla12" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla13" src="/img/blanco.png" alt="">
                        <img class="casillaSegundaFila" id="casilla14" src="/img/blanco.png" alt="">
                    </section>
                    <section class="terceraFila">
                        <img class="casillaTerceraFila" id="casilla15" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla16" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla17" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla18" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla19" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla20" src="/img/blanco.png" alt="">
                        <img class="casillaTerceraFila" id="casilla21" src="/img/blanco.png" alt="">
                        <img class="casillaInvisible" src="" alt="">
                    </section>
                    <section class="cuartaFila">
                        <img class="casillaInvisible" src="" alt="">
                        <img class="casillaCuartaFila" id="casilla22" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla23" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla24" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla25" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla26" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla27" src="/img/blanco.png" alt="">
                        <img class="casillaCuartaFila" id="casilla28" src="/img/blanco.png" alt="">
                    </section>
                </aside>
            </section>

            <article class="caja__contenedor">
                <form action="/profile" id="modifyTeam" method="POST" class="caja__contenedor__formulario">
                    @csrf
                    @method('PATCH')
                    <i class="fa-solid fa-trophy"></i><input class="caja__contenedor__formulario__input"
                        type="number" title="Number of victories" name="victories" id="victories" value="{{ $team->victories }}">
                    <i class="fa-solid fa-gamepad"></i><input class="caja__contenedor__formulario__input"type="number"
                        name="num_match" title="Number of matches" id="num_match" value="{{ $team->num_match }}">
                    <input type="hidden" name="team_id" value="{{ $team->id }}">
                    <button class="caja__contenedor__formulario__button--orange"type="submit"><i
                            class="fa-solid fa-plus"></i></button>
                </form>
            </article>
        @endforeach

    </section>

    <!--Propagación de id usuario y si es admin
    <p>Id usuario:{{ session('user_id') }}</p>
    <p>Admin:{{ session('admin') }}</p>-->

    <!--Script-->
    <script>
        const url =
            "https://raw.communitydragon.org/latest/plugins/rcp-be-lol-game-data/global/en_gb/v1/tftchampions.json";

        document.addEventListener("DOMContentLoaded", function() {
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

                        @foreach ($teams as $row)
                            var tableros = document.getElementById("tablero" + {{ $row->id }});
                            console.log(tableros);


                            var teamRows = <?php echo json_encode($teamRows); ?>;
                            console.log(teamRows);

                            for (let i = 0; i < teamRows.length; i++) {
                                for (let child of tableros.children) {
                                    for (let img of child.children) {
                                        if (img.id === "casilla" + teamRows[i].position && teamRows[i]
                                            .team_id === {{ $row->id }}) {
                                            img.src =
                                                "https://raw.communitydragon.org/latest/game/assets/characters/tft10_" +
                                                teamRows[i].character_id.substr(6).toLowerCase() +
                                                "/hud/tft10_" + teamRows[i].character_id.substr(6)
                                                .toLowerCase() + "_square.tft_set10.png";
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
    <script type="module" src="js/modifyTeam.js"></script>
    <script type="module" src="js/validation.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>

</x-layout>
