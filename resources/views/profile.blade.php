<!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
@if(session()->has('success'))
    <div>
        <p>{{session('success')}}</p>
    </div>
@endif
<!--Bucle que muestra los equipos que has creado en tu perfil (en curso)-->
<x-layout>
<x-header />
@foreach($teams as $team)
    <div>
    <p>Nombre del equipo: {{ $team->team_name }}</p>
    <p>Victorias: {{ $team->victories }}</p>
    <div id="contenido">
        
    </div>
    <form action="/profile" method="POST">
        @csrf
        @method('DELETE')
        
        <input type="hidden" name="team_id" value="{{$team->id}}">
        <input type="submit" value="Eliminar equipo">
    </form>
    </div>
    
@endforeach

<!--Boton crear equipo-->
<button><a href="/createTeam"> Crear equipo</a></button>
<!--Propagación de id usuario y si es admin-->
<p>Id usuario:{{session('user_id')}}</p>
<p>Admin:{{session('admin')}}</p>


<!--Script-->
<script src="{{ asset('filtradoPersonajesProfile.js') }}"></script>

</x-layout>




