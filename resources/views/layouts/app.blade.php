<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name', 'MultiShop') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link href="{{ asset('public/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top navbarColors navbar-color">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->

                    <a class="navbar-brand logo color-white " href="{{ url('/') }}">
                        {{ config('app.name', 'MultiShop') }} &nbsp;
                        <span>
                            <img src="{{ asset('images/keyboard-m.png') }}"> 
                        </span>
                    </a>
                       
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                   
                        
                  
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="color-white-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a class="color-white-link" href="{{ route('register') }}">Crear una cuenta</a></li>
                            <li><a class="color-white-link" href=""><img src="{{ asset('images/carrito-de-compras.png') }}"></a></li>
                        @else
                            <form class="navbar-form navbar-left" role="search" action="{{url('/buscar')}}">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Productos" name="search" id="search" value="{{old('search')}}">                        
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <img src="{{ asset('images/lupa.png') }}"> 
                                </button>
                            </form>
                            <li>
                            @if(Auth::user()->role==1)
                                <a class="color-white-link" href="{{url('/home')}}">Productos</a>
                            @else
                                <a class="color-white-link" href="{{url('/')}}">Catalogo</a>
                            @endif
                                
                            </li>
                            <li class="dropdown">
                                <a href="#" class="color-white-link" data-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li><a class="color-white-link" href=""><img src="{{ asset('images/carrito-de-compras.png') }}"></a></li> --}}
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container vertical-view">
            <br><br><br><br>

            @yield('content')
        </div>   
        <footer class="col-md-10 col-md-offset-1">
            <hr>
            <p>MultiShop tu tienda en lineda de confianza &copy; 2021</p>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('public/js/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/js/bootstrap.min.js') }}"></script>
</body>
</html>
