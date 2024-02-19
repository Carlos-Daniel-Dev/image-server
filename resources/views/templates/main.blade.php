<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .imagem {
          max-width: 100%;
          max-height: 80vh;
          margin: auto;
          display: block;
        }

        * {
            font-family: 'Roboto', sans-serif;
            color: black;        
        }
    </style>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Home</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            @if (Cookie::has('user_token'))

                @php
                    $user = App\Models\User::where('token', $_COOKIE['user_token'])->first();
                @endphp

                @if ($user)
                    <a href="{{ route('profile') }}">Profile</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endif
            @else
                <a href="{{ route('login') }}">Login</a>
            @endif

          </ul>
        </div>
      </div>
    </nav>
    @yield('content')
</body>
</html>
