<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Ruta al cole</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <style>
    #start{
      display: flex;
      height:100vh;
      align-items: center;
      justify-content: center;
    }

    .nav {
      background: #e9ecef;
    }
  </style>

</head>

<body>
  <div class="flex-center position-ref full-height">

    @if (Route::has('login'))
    <ul class="nav justify-content-end">
      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('login') }}">Login</a>
      </li>
      @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Registro</a>
      </li>
      @endif
      @endauth
    </ul>
    @endif

    <div class="jumbotron jumbotron-fluid" id="start">
      <div class="container">
        <h1 class="display-1 text-center">Ruta al Cole</h1>
        <p class="lead text-center">Una app para ver las rutas que usan tus hijos</p>
      </div>
    </div>
  </div>
</body>

</html>