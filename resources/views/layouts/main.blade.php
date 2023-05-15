<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  {{-- Fonts Google --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <title>@yield('title')</title>
</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
      <img class="logo" src="/img/logo.png" alt="Consult" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      @auth
        <ul class="navbar-nav">
          <li class="nav-item {{ strtolower(request()->path()) == strtolower('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">RELATÓRIOS</a>
          </li>
          @if (Auth::user()->role_id == 3 || Auth::user()->departament == 7)
            <li class="nav-item {{ strtolower(request()->path()) == strtolower('clients/listagem') ? 'active' : '' }}">
              <a class="nav-link" href="/clients/listagem">CLIENTES</a>
            </li>
          @endif
          @if (Auth::user()->role_id == 3)
            <li class="nav-item {{ strtolower(request()->path()) == strtolower('users/listagem') ? 'active' : '' }}">
              <a class="nav-link" href="/users/listagem">USUÁRIOS</a>
            </li>
            <li
              class="nav-item {{ strtolower(request()->path()) == strtolower('classifications/listagem') ? 'active' : '' }}">
              <a class="nav-link" href="/classifications/listagem">CLASSIFICAÇÕES</a>
            </li>
            <li
              class="nav-item {{ strtolower(request()->path()) == strtolower('departaments/listagem') ? 'active' : '' }}">
              <a class="nav-link" href="/departaments/listagem">DEPARTAMENTOS</a>
            </li>
          @endif
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-uppercase " href="/">{{ Auth::user()->name }}</a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="POST">
              @csrf
              <a class="nav-link" href="/logout"
                onclick="event.preventDefault();
                  this.closest('form').submit();">
                SAIR
              </a>
            </form>
          </li>
        </ul>
      @endauth
    </div>
  </nav>
</header>

<body>
  <div class="container-fluid">
    <div class="row mb-3">
      @if (session('msg'))
        <p class="msg">
          {{ session('msg') }}
        </p>
      @endif
    </div>
    @yield('content')
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
<script>
  $(document).ready(function() {
    $('#client_id').select2();
  });
</script>

</html>
