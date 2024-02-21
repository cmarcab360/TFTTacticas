<x-layout>
    <section>
        <h1>Register</h1>
        <form action="/register" method="POST">
            <!--Crea un campo hidden con un token para este usuario-->
            @csrf 
            <div>
                <label for="name">NAME</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="username">USERNAME</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">PASSWORD</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </form>
    </section>
</x-layout>