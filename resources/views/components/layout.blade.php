<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>TFT Tactics</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
</head>

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