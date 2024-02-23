<x-layout>
    <section>
        <h3>Creacion de equipo</h3>

        <form action="/createRow" method="post">
            @csrf
            <div>
                <label for="character_id">Campeon:</label>
                <input type="number" name="character_id" id="character_id" required>
                @error('character_id')
                    <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="team_id">id team:</label>
                <input type="number" name="team_id" id="team_id" required>
                @error('team_id')
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

            <button type="submit">Crear Equipo</button>
        </form>


    </section>

</x-layout>
