<x-layout>
<!--Mensaje de success si logout se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
@if(session()->has('success'))
    <div>
        <p>{{session('success')}}</p>
    </div>
@endif
hola

<!--Solo si eres un guest, se mostrará el botón de register y el Formulario de log in. Tbn podría ser if(! auth->check())-->
@guest
<section>
        <h1>Log In</h1>
        <form action="/" method="POST">
            <!--Crea un campo hidden con un token para este usuario-->
            @csrf 
            <div>
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required>
                @error('email')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit">Log In</button>
                <button><a href="/register">Registrarse</a></button>
            </div>
        </form>
    </section>
    
@endguest

</x-layout>