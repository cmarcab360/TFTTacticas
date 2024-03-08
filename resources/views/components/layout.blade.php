<!doctype html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>TFT Tactics</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link href="css/main.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link href="css/createRow.css" rel="stylesheet" >
    <link href="css/header.css" rel="stylesheet">
    <link href="css/creaTeam.css" rel="stylesheet">
    <link href="css/miniMeta.css" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script
      src="https://kit.fontawesome.com/f0d12fad38.js"
      crossorigin="anonymous"
    ></script>
    <link href="css/profile.css" rel="stylesheet">
</head>

<body>


    {{ $slot }}


    <!--Mensaje de success si registo se ha hecho/ Eliminar este mensaje con javaScript despues de 3 sec-->
    @if(session()->has('success'))
    <div class="success" id="success">
        <p>{{session('success')}}</p>
    </div>
    @endif

    <!--Scripts-->
    <script src="{{ asset('js/success-message.js') }}"></script>
</body>