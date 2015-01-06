@extends('master')
@section('title')试卷列表@stop
@section('content')
    <div class="container">
        <div ng-controller="listTestPaperController">
            <table class="table">
                <thead>
                    <th>考试名称</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>创建人</th>
                </thead>
                <tbody>
                    <tr ng-repeat="test in testpapers">
                        <td>@{{ test.name }}</td>
                        <td>@{{ test.start_time }}</td>
                        <td>@{{ test.end_time }}</td>
                        <td>@{{ test.creater }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop