<header>
    <!--Mensaje bienvenida-->
    <span>Welcome, {{auth()->user()->name}}</span>
    <!--Logout-->
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Log Out</button>
    </form>
</header>