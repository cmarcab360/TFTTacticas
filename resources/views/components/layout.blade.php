<!doctype html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TFT Tactics</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/creaTeam.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/360f8408f4.js" crossorigin="anonymous"></script>
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