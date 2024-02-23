<x-layout>

hola

<!--Solo si eres un guest, se mostrará el botón de register. Tbn podría ser if(! auth->check())-->
@guest
    <a href="/register">Registrarse</a>
@else
    <span>Welcome, {{auth()->user()->name}}</span>
@endguest

</x-layout>