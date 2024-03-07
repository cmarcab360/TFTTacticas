<header class="header">
    <!--Mensaje bienvenida-->
    <p class="header__welcome">Welcome, {{ucfirst(auth()->user()->name)}}</p>
    <picture class="header__picture">
        <source media="(min-width: 700px)" srcset="/img/logo.png">
        <img src="/img/logo2.png" alt="Logo TFTTactics" class="header__picture__logo">
    </picture>
    <div class="header__options">
        <!--Boton crear equipo-->
        <button class="header__options__create"><a href="/createTeam">Add team</a></button>
        <!--Logout-->
        <form action="/logout" method="POST" class="header__options__button">
            @csrf
            <button type="submit" class="header__options__button__logout">Log Out</button>
        </form>
    </div>
</header>