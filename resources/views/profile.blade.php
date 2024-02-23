<!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
@if(session()->has('success'))
    <div>
        <p>{{session('success')}}</p>
    </div>
@endif
<x-layout>
@foreach($teams as $team)
    <p>Nombre del equipo: {{ $team->team_name }}</p>
    <hr>
@endforeach
</x-layout>
<!--Mensaje bienvenida-->
<span>Welcome, {{auth()->user()->name}}</span>
<!--Logout-->
<form action="/logout" method="POST">
    @csrf
    <button type="submit">Log Out</button>
</form>

