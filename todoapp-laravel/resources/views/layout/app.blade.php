<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Todo App</title>
    <!-- BOORTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+KuaiLe&display=swap" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-family: 'ZCOOL KuaiLe', cursive;">
      <a class="navbar-brand" href="/">Todos</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('todo.index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
      </div>
  </nav>
        <div class="container my-3">
          @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success')}}
            </div>
          @endif
        </div>
      <div class="container">
        @yield('content')
      </div>

  
  </body>
</html>
