@extends('layout');

<x-formulario>
    <form action="" method="post">
        <label for="team_name">Nombre del equipo:</label>
        <input type="text" name="team_name" id="team_name" required>

        <label for="victories">Victorias:</label>
        <input type="number" name="victories" id="victories">

        <label for="num_match">Partidas jugadas:</label>
        <input type="number" name="num_match" id="num_match">

        <input type="submit" value="Guardas equipo" >
    </form>
</x-formulario>