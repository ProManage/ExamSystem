<!DOCTYPE html>
<html>
<head>
    <link href="./static/css/bootstrap.css" media="all" rel="stylesheet" type="text/css">
    <style>
        body{
            padding-top: 50px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
<!--            @if ( Auth::guest() )-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="" data-toggle="modal" data-target="#register_modal">注册</a></li>
                <li><a href="" data-toggle="modal" data-target="#login_modal">登陆</a></li>
            </ul>
<!--            @else-->
<!--            Welcome, <strong>{{ HTML::link('admin', Auth::user()->username) }} </strong> |-->
<!--            {{ HTML::link('logout', 'Logout') }}-->
<!--            @endif-->

        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <h1 class="text-center">程序设计课程考试系</h1>
</div>
<div class="modal fade" id="register_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">注册</h4>
            </div>
            <form id="modal_register_form" role="form" method="post" action="./register.php">
                <div class="modal-body">
                    <div class="form-group"><input type="text" class="form-control" name="username" placeholder="用户名">
                    </div>
                    <div class="form-group"><input type="email" class="form-control" name="email" placeholder="电子邮箱">
                    </div>
                    <div class="form-group"><input type="password" class="form-control" name="password"
                                                   placeholder="密码"></div>
                    <div class="form-group"><input type="password" class="form-control" name="password_repeat"
                                                   placeholder="重复密码"></div>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">登陆</h4>
            </div>
            <form id="modal_login_form" role="form" method="post" action="./login.php">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="text" class="form-control" name="username" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input type="password" class="form-control" name="password" placeholder="密码">
                    </div>
                    <div class="form-group">
                        <label class="control-label">记住我:</label>
                        <select class="form-control" name="session_expiry">
                            <option value="18000">5小时</option>
                            <option value="172800">2天</option>
                            <option value="1209600">2周</option>
                            <option value="5356800">2个月</option>
                        </select>
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
<script src="static/js/jquery-2.1.3.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
</body>
</html>