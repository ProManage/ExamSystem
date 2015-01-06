<!DOCTYPE html>
<html ng-app="exsys">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - ExSys</title>
    <link href="{{URL::to('/static/css/bootstrap.css')}}" media="all" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/static/css/main.css')}}" media="all" rel="stylesheet" type="text/css">
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
    <script src="{{URL::to('/static/js/angular-animate.js')}}"></script>
    <script src="{{URL::to('/static/js/app.js')}}"></script>
    <script src="{{URL::to('/static/js/controller.js')}}"></script>
    @yield('head')

</head>
<body>
<input type="hidden" ng-init="root_url='{{URL::to('/')}}'">
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
            <a class="navbar-brand" href="{{URL::to('/')}}">ExSys</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if ( Auth::check()  && Auth::user() -> role == 'teacher' )
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">试题 <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{URL::to('/questions/')}}">试题列表</a></li>
                            <li><a href="{{URL::to('/questions/create')}}">创建试题</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">试卷 <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{URL::to('/testpapers')}}">试卷列表</a></li>
                            <li><a href="{{URL::to('/testpapers/create')}}">创建试卷</a></li>
                        </ul>
                    </li>
                @endif
                <li><a href="{{URL::to('/tests')}}">考试</a></li>
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
                            <li><a href="{{ URL::to('/users') . '/'.Auth::user()->id }}">我的账户</a></li>
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
<div class="modal fade" id="register_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">注册</h4>
            </div>
            <form id="modal_register_form" role="form" method="post" action="register">
                <div class="modal-body">
                    <div class="form-group"><input type="text" class="form-control" name="username" placeholder="用户名">
                    </div>
                    <div class="form-group"><input type="email" class="form-control" name="email" placeholder="电子邮箱">
                    </div>
                    <div class="form-group"><input type="password" class="form-control" name="password"
                                                   placeholder="密码"></div>
                    <div class="form-group"><input type="text" class="form-control" name="student_id" placeholder="学号">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">注册</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="login_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">登陆</h4>
            </div>
            <form id="modal_login_form" role="form" method="post" action="login">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="text" class="form-control" name="username" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="password" class="form-control" name="password" placeholder="密码">
                    </div>
                </div>
                <div class="modal-footer">
                    <label class="errmsg haserr pull-left"></label>
                    <button class="btn btn-default" type="button" data-dismiss="modal">取消</button>
                    <button class="btn btn-primary" type="submit">登陆</button>
                </div>
            </form>
        </div>
    </div>
</div>
@yield('extra_script')
</body>
</html>