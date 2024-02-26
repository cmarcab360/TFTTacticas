<!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
@if(session()->has('success'))
    <div>
        <p>{{session('success')}}</p>
    </div>
@endif
<!--Bucle que muestra los equipos que has creado en tu perfil (en curso)-->
<x-layout>
<x-header />

<style>
.casillaPrimeraFila,
.casillaSegundaFila,
.casillaTerceraFila,
.casillaCuartaFila
{
    border: solid #000a11 0.2000rem;
    width: 30px;
    height: 30px;
}
.casillaInvisible
{
    width: 15px;
    height: 0px;   
}
    </style>
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

<!--Boton crear equipo-->
<button><a href="/createTeam"> Crear equipo</a></button>
<!--Propagación de id usuario y si es admin-->
<p>Id usuario:{{session('user_id')}}</p>
<p>Admin:{{session('admin')}}</p>


<!--Script-->
<script src="{{ asset('filtradoPersonajesProfile.js') }}"></script>

</x-layout>




