<!DOCTYPE html>
<html ng-app="exsys">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="{{URL::to('/static/css/bootstrap.css')}}" media="all" rel="stylesheet" type="text/css">
    {{--    <link href="{{URL::to('/static/css/bootstrap-theme.css')}}" media="all" rel="stylesheet" type="text/css">--}}
    <style>
        body {
            padding-top: 70px;
        }

        li {
            list-style-type: none;
        }

        ul, ol {
            padding: 0;
        }
    </style>
    <script src="{{URL::to('/static/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{URL::to('/static/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('/static/js/angular.js')}}"></script>
    <script src="{{URL::to('/static/js/app.js')}}"></script>
    <script src="{{URL::to('/static/js/controller.js')}}"></script>
    @yield('head')

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ExSys</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            @if ( Auth::guest() )
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="" data-toggle="modal" data-target="#register_modal">注册</a></li>
                    <li><a href="" data-toggle="modal" data-target="#login_modal">登陆</a></li>
                </ul>
            @else
                <div class="navbar-right  hidden-xs nav navbar-nav">

                    <li class="dropdown onhover-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->username}}<b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{">我的账户</a></li>
                            <li><a href="{{URL::route('logout')}}" onclick="return ajax_logout()"
                                   data-no-instant="">注销</a></li>
                        </ul>
                    </li>
                </div>
            @endif
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
@yield('content')

@yield('extra_script')
</body>
</html>