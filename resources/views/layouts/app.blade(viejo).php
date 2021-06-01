<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Sistema Ciaca', 'Sistema Ciaca') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- font awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- tempusdominus -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript">
        $(function () {

            $('#datetimepicker4').datetimepicker({
              format: 'LT'
            });
        });
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Sistema Ciaca', 'Sistema Ciaca') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <!--@can('products.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">Productos</a>
                      </li>
                      @endcan-->
                      @can('users.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
                      </li>
                      @endcan
                      @can('roles.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('roles.index')}}">Roles</a>
                      </li>
                      @endcan
                      @can('estudiantes.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('estudiantes.index')}}">Estudiantes</a>
                      </li>
                      @endcan
                      @can('instructors.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('instructors.index')}}">Instructores</a>
                      </li>
                      @endcan
                      @can('compras.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('compras.index')}}">Compras</a>
                      </li>
                      @endcan
                      @can('vuelos.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('vuelos.index')}}">Vuelos</a>
                      </li>
                      @endcan
                      @can('horascontrols.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('horascontrols.index')}}">Cartelera</a>
                      </li>
                      @endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">

          @if(session('info'))
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2">
                  <div class="alert alert-success">
                    {{ session('info') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
