<x-layout>
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

            <!-- Comprueba si el rol del usuario es admin o usuario normal, si es admin aparece un nuevo campo para preguntar si el equipo es meta -->
            <input type="hidden" name="meta" value={{ true }}>
            @error('meta')
                <p>{{ $message }}</p>
            @enderror

            <div>
                <label for="user_id">Nº id user:</label>
                <input type="number" name="user_id" id="user_id" required>
                @error('user_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <button type="submit">Crear Equipo</button>
        </form>


    </section>

</x-layout>
