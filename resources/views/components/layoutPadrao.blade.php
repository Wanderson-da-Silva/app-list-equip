<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!--asset vai na pasta public e acessa o arquivo app.css-->
    <link rel ="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body>
    <!--onde vai ser carregado titulo-->
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h1> {{ $title }}</h1>
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset
    @isset($mensagemErro)
    <div class="alert alert-success">
        {{ $mensagemErro }}
    </div>
    @endisset
    <!--onde vai ser carregado as informacoes que preeencheram a tela-->
    {{  $slot }}
    </div>
</body>
</html>