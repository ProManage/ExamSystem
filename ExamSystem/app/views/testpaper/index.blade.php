@extends('master')
@section('title')试卷列表@stop
@section('content')
    <div class="container">
        <div>
            <table class="table">
                <thead>
                    <th>考试名称</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                    <th>创建人</th>
                    <th>删除</th>
                </thead>
                <tbody>
                @foreach ($testpapers as $test)
                    <tr>
                        <td><a href="{{URL::to('/testpapers') .'/'. $test->id}}">{{ $test->name }}</a></td>
                        <td>{{ $test->start_time }}</td>
                        <td>{{ $test->end_time }}</td>
                        <td>{{ $test->creater }}</td>
                        <td><form method="POST" action="{{URL::to('/testpapers') .'/'. $test->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button  class="btn btn-xs btn-danger" type="submit">删除</button>
                        </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop