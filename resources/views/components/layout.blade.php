<!doctype html>
<head>
    <meta charset="utf-8" />
    <title>TFT Tactics</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/createRow.css" rel="stylesheet" >
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TFT Tactics</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
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