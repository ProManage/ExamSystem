@extends('master')
@section('content')
    <div class="container">
        <form role="form" class="center-block" method="post" action="{{URL::to("/login")}}" style="max-width:400px">
            <div class="clearfix">
                <h4 class="pull-left">登陆</h4>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" value="" placeholder="用户名">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="密码">
            </div>
            <div class="form-group"><button type="submit" class="btn btn-primary btn-block">登陆</button></div>
        </form>
    </div>
@stop