<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}

    {{-- <script src="{{ asset('js/bootstrap.js') }}" defer></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
</head>

<body class="antialiased" style="height: 100vh">
    <div class="container" style="display: grid; place-items: center;">
        <h4>Teste para vaga de desenvolvedor</h4>
        <p>Site para registrar vendas e suas parcelas, clientes e produtos.</p>
        <a class="btn btn-primary" href="/vendas">Começar</a>
    </div>
</body>

</html>
