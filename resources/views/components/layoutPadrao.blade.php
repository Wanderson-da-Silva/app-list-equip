<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!--asset vai na pasta public e acessa o arquivo app.css-->
    <link rel ="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
    <!--onde vai ser carregado titulo-->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('equipamentos.listar')}}">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      @auth
      <li class="nav-item">
          <a class="nav-link" href="{{route('equipamentos.listar')}}">Equipamento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('marcas.listar')}}">Marca</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('fornecedores.listar')}}">Fornecedor</a>
        </li>
        @endauth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        
      </ul>
      <!--if(Auth::user())-->
      @auth
      <li class="nav-item d-flex">
    
      <a class="nav-link" href="{{route('login.dest')}}">Sair</a>
    
</li>
@endauth
    </div>
  </div>
</nav>

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
    <div class="alert alert-danger">
        {{ $mensagemErro }}
    </div>
    @endisset
    <!--onde vai ser carregado as informacoes que preeencheram a tela-->
    {{  $slot }}
    </div>
</body>
</html>