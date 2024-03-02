<!doctype html>

<title>Laravel From Scratch Blog</title>
<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>-->
<style>
    .success {
        color:#E0E3E4;
        background-color: #D47559;
        padding-top: 2px;
        padding-right: 4px;
        position: fixed;
        bottom: 3px;
        right: 3px;
        justify-content: center;
        border-radius: 5px;
    }
</style>

<body>


    {{ $slot }}

    <footer>
        footer
    </footer>

    <!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
    @if(session()->has('success'))
    <div class="success" id="success">
        <p>{{session('success')}}</p>
    </div>
    @endif

    <!--Scripts-->
    <script src="{{ asset('js/success-message.js') }}"></script>
</body>