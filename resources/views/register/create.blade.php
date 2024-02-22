<x-layout>
    <section>
        <h1>Register</h1>
        <form action="/register" method="POST">
            <!--Crea un campo hidden con un token para este usuario-->
            @csrf 
            <div>
                <label for="name">NAME</label>
                <input type="text" name="name" id="name" value="{{old('name')/*Cuando se haya cometido un error en otro campo no tenga que volver a llenar este campo*/}}" required>
                @error('name')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username" value="{{old('username')}}" required>
                @error('username')
                    <p>{{$message}}</p>
                @enderror
            </div>
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
                <button type="submit">Submit</button>
            </div>
        </form>
    </section>
</x-layout>