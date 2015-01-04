@extends('master')
@section('title')
    程序设计课程考试系统
@stop
@section('content')
    <div class="container">
        <h1 class="text-center">程序设计课程考试系统</h1>
    </div>
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
@stop 