<x-layout>
<x-header />
    <section>
        <h3>Listado de Campeones</h3>


        <h2>Crear Equipo TFT</h2>

        <form action="/createTeam" method="post">
            @csrf
            <div>
                <label for="team_name">Nombre del Equipo:</label>
                <input type="text" name="team_name" id="team_name" required>
                @error('team_name')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="victories">Victorias:</label>
                <input type="number" name="victories" id="victories" required>
                @error('victories')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="num_match">Número de Partidas:</label>
                <input type="number" name="num_match" id="num_match" required>
                @error('num_match')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <!-- Si el usuario es admin el team se asigna como meta por defecto -->
            <input type="hidden" name="meta" value="{{auth()->user()->admin ? 1 : 0 }}">

            <!-- Campo oculto para almacenar user_id -->
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <!-- Campo oculto para almacenar team_id -->
            <input type="hidden" name="team_id" value="{{ session('team_id') }}">

            <button type="submit">Crear Equipo</button>
        </form>


    </section>

</x-layout>
