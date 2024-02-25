<x-layout>
<x-header />
    <!--Propagación de id usuario y si es admin-->
    <p>Id team:{{ session('team_id') }}</p>
    @dump(session()->all())
    <section>
        <h3>Creacion de equipo</h3>

        <div id="contenedor"></div>

        <form action="/createRow" method="post">
            @csrf
            <div>
                <label for="character_id">Campeon:</label>
                <input list="campeonesList" name="character_id" id="character_id" />
                <datalist id="campeonesList"></datalist>
                @error('character_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="position">position:</label>
                <input type="number" name="position" id="position" required>
                @error('position')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo oculto para almacenar id_team-->
            <input type="hidden" name="team_id" value="{{ session('team_id') }}">


            <button type="submit">Añadir Campeon</button>

        </form>

        <!-- Muestra las todas las filas del team-->
        @if (session('teamRows'))
            <h4>Campeones seleccionados</h4>
            <table>
                @foreach (session('teamRows') as $row)
                    <tr>
                    <td class="campeon">{{ str_replace('TFT10_', '', $row->character_id) }}</td>
                        <td>{{ $row->position }}</td>
                    </tr>
                @endforeach

            </table>
        @endif
        <a href="/profile">Volver a la pagina principal</a>
    </section>
    <script src="{{ asset('filtradoPersonajesCreateRow.js') }}"></script>
</x-layout>
