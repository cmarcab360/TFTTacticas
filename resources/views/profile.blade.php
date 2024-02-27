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
                <p>{{ round($team->victories/$team->num_match*100) }}%</p>
            </div>
            <div>
                @foreach($team->teamrow as $row)
                <img src="https://raw.communitydragon.org/latest/game/assets/characters/{{Str::of($row->character_id)->lower()}}/hud/{{Str::of($row->character_id)->lower()}}_square.tft_set10.png" alt="Champion {{Str::of($row->character_id)->substr(6)}}" title="{{Str::of($row->character_id)->substr(6)}}">
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
    @foreach($teams as $team)
    <div>
        <p>Nombre del equipo: {{ $team->team_name }}</p>
        <p>Victorias: {{ $team->victories }}</p>
        <div class="tablero">
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
    <form action="/profile" method="POST">
        @csrf
        @method('DELETE')

        <input type="hidden" name="team_id" value="{{$team->id}}">
        <input type="submit" value="Eliminar equipo">
    </form>
    </div>

    @endforeach

    
    <!--Propagación de id usuario y si es admin-->
    <p>Id usuario:{{session('user_id')}}</p>
    <p>Admin:{{session('admin')}}</p>


    <!--Script-->
    <script src="{{ asset('filtradoPersonajesProfile.js') }}"></script>
    <script src="{{ asset('js/show-hide.js') }}"></script>

</x-layout>