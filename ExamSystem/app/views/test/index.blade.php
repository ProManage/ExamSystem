@extends('master')
@section('title')考试列表@stop
@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <th>考试名称</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>创建人</th>
            </thead>
            <tbody>
            @foreach ($tests as $test)
                <tr>
                    <td><a href="{{URL::to('/tests') .'/'. $test->id}}">{{ $test->name }}</a></td>
                    <td>{{ $test->start_time }}</td>
                    <td>{{ $test->end_time }}</td>
                    <td>{{ $test->creater }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop