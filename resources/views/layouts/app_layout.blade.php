<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', setting('app_name'))</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('header')
</head>
<body>
<nav class="navbar navbar-default">

    @include('vendor/flash/message')

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ setting('app_name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                </li>
            </ul>
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="form-group">
                    <input type="text" value="" class="form-control" placeholder="{{ trans('app.search') }}...">
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">{{ trans('auth.login') }}</a>
                    <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">{{ trans('auth.register') }}</a>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ Auth::user() }}">Profile</a></li>
                            <li><a href="/auth/logout">{{ trans('auth.logout') }}</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

@if (Auth::guest())
    @include('_partials._login_modal')
@endif
<!-- Scripts -->
<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/script.js') }}"></script>
@yield('footer')
@include('_partials._footer')
</body>
</html>