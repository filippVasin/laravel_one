<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet">





</head>
<body>


<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="{{ route('message.index') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <ul class="nav">
                <li class="{{ Request::is( 'message') ? 'active' : '' }}"><a href="{{ route('message.index') }}">Главная</a></li>
            @guest
                <li class="{{ Request::is( 'login') ? 'active' : '' }}"><a href="{{ route('login') }}">Авторизация</a></li>
                <li class="{{ Request::is( 'register') ? 'active' : '' }}"><a href="{{ route('register') }}">Регистрация</a></li>
            @endguest
        </ul>

        <ul class="nav pull-right">
            @guest
            @else
                <li><a> {{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Выход</a></li>
                @endguest
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
</div>

        @yield('content')


    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
