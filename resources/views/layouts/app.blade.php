<!DOCTYPE html>
<!-- Default navigation bar -->
<html lang="{{ config('app.locale') }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/font-awesome.min.css') }}">

    {!! Html::style('css/select2.min.css')!!}
    @yield('stylesheets')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- Font Awesome Icon -->
    <script src="https://use.fontawesome.com/ef7c61bda8.js"></script>
</head>
<body>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><img src="/innobio_logo.png" alt="innobio_logo" style="width:100px;height:40px;"></li>
                        <li><a href="{{ route('production.index') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Production</a></li>
                        <li><a href="{{ route('stock.index') }}"> <i class="fa fa-list-alt" aria-hidden="true"></i> Stock</a></li>
                        <li><a href="{{ route('items.create') }}"><i class="fa fa-flask" aria-hidden="true"></i> Item</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa fa-money" aria-hidden="true"></i> Financial</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa fa-file-text" aria-hidden="true"></i> Report</a></li>
                        <li><a href="{{ route('users.index') }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Hi {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Html::script('js/select2.min.js')!!}
    @yield('script')
</body>
</html>
