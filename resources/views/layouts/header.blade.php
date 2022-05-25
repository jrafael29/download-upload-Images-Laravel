<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>stockRest</title>
</head>
<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand navbar-light">
                <div class="container-fluid">
                  <a class="navbar-brand text-light" href="{{route('index')}}">stockRest</a>
                  <div class="navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                      @if( !empty(Auth::user()) && Auth::user()->admin != 0 )
                        <li class="nav-item ">
                          <a class="nav-link text-light" href="{{route('usuarios.index')}}">Gerenciar usuarios</a>
                        </li>
                      @endif
                      <li class="nav-item ">
                        <a class="nav-link text-light" href="{{route('login')}}">Painel</a>
                      </li>
                      @if(!empty(Auth::user()))
                        <li class="nav-item ">
                          <a class="nav-link text-light" href="{{route('logout')}}">Sair</a>
                        </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
</script>