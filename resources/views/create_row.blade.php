<x-layout>
    <x-header />
    <!--Propagación de id usuario y si es admin-->
    <!--<p>Id team:{{ session('team_id') }}</p>-->
    <section class="section">
        <h3 class="section__h3">Creacion de equipo</h3>

        <div id="iconosFichas" class="section__iconos"></div>

        <form action="/createRow" method="post" id="addChamp" class="section_form">
            @csrf
            <div>
                <input type="hidden" list="campeonesList" name="character_id" id="character_id" value="nulo"/>
                <datalist id="campeonesList"></datalist>

                @error('character_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="section__form__position">
                <input type="hidden" name="position" id="position" required>
                @error('position')
                    <p>{{ $message }}</p>
                @enderror
                <button type="submit" id="addChamp">Añadir campeón</button>
            </div>

            <!-- Campo oculto para almacenar id_team-->
            <input type="hidden" name="team_id" value="{{ session('team_id') }}">
        </form>

        <aside class="section__aside">
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
        </aside>
        <button class="section__button">
            <a class="section__button__goBack" href="/profile">Volver a la pagina principal</a>
        </button>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('teamRows'))
                @foreach (session('teamRows') as $row)
                    var imgSrc =
                        "https://raw.communitydragon.org/latest/game/assets/characters/tft10_{{ preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace('TFT10_', '', $row->character_id))) }}/hud/tft10_{{ preg_replace('/[^a-zA-Z0-9]/', '', strtolower(str_replace('TFT10_', '', $row->character_id))) }}_square.tft_set10.png";
                    document.getElementById('casilla{{ $row->position }}').src = imgSrc;
                @endforeach
            @endif
        });
    </script>
    <script src="{{ asset('js/filtradoPersonajesCreateRow.js') }}"></script>
    <x-miniMeta />
</x-layout>
