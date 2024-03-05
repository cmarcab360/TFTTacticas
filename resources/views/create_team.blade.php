<x-layout>
    <x-header />
    <section class="contenedor">
        <h1 class="contenedor__titulo">Create your team</h1>


        <article class="contenedor__article">
            <img src="img/pengu.png" alt="imagen pingui" class="contenedor__article__imagen">

            <form action="/createTeam" method="post" id="createTeam" class="contenedor__article__formulario">
                @csrf
                <div class="contenedor__article__formulario__input">
                    <label for="team_name" class="contenedor__article__formulario__input__label">Name of the team:</label>
                    <input type="text" name="team_name" id="team_name" required class="contenedor__article__formulario__input__caja">
                    @error('team_name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="contenedor__article__formulario__input">
                    <label for="victories" class="contenedor__article__formulario__input__label">Number of victories:</label>
                    <input type="number" name="victories" id="victories" required class="contenedor__article__formulario__input__caja">
                    @error('victories')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="contenedor__article__formulario__input">
                    <label for="num_match" class="contenedor__article__formulario__input__label">number of matches played:</label>
                    <input type="number" name="num_match" id="num_match" required class="contenedor__article__formulario__input__caja">
                    @error('num_match')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Si el usuario es admin el team se asigna como meta por defecto -->
                <input type="hidden" name="meta" value="{{ auth()->user()->admin ? 1 : 0 }}">

                <!-- Campo oculto para almacenar user_id -->
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <!-- Campo oculto para almacenar team_id -->
                <input type="hidden" name="team_id" value="{{ session('team_id') }}">

                <button type="submit" class="contenedor__article__formulario__button">Create team</button>
            </form>
        </article>


    </section>
    <script type="module" src="js/createTeam.js"></script>
    <script type="module" src="js/validation.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
</x-layout>
