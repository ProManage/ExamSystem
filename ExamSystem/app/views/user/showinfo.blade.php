@extends('master')
@section('head')
@stop
@section('content')	
	<div class="container">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">我的信息</div>
                <form class="form-horizontal panel-body" role="form" id="base_setting" method="post" action="{{URL::to("/users") ."/" . $user->id}}">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">角色:</label>
                        <div class="col-sm-9">
                            <!--
                            <label class="control-label">{{Auth::user()->role}}</label>
                            -->
                            <input readonly="true" class="form-control" type="text" value="{{$user->role}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">用户ID:</label>
                        <div class="col-sm-9">
                            <!--
                            <label class="control-label" name="uid">{{Auth::user()->id}}</label>
                            -->
                            <input readonly="true" class="form-control" type="text" name="id" value="{{$user->id}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">用户名:</label>
                        <div class="col-sm-9">
                            <!--
                            <label class="control-label">{{$user->username}}</label>
                            -->
                            <input  readonly="true" class="form-control" type="text" value="{{$user->username}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">E-Mail:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label col-sm-11">
                            <button class="btn btn-default" type="submit">修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
@stop