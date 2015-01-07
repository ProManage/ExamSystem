@extends('master')
@section('title')成绩@stop
@section('content')
    <div class="container">
        <div>
            <table class="table">
                <thead>
                <th>账号</th>
                <th>学号</th>
                <th>分数</th>
                <th></th>
                </thead>
                <tbody>
                @foreach ($examinees as $examinee)
                    <tr>
                        <td>{{$examinee->username}}</td>
                        <td>{{ $examinee->student_id }}</td>
                        <td>{{ $examinee->score }}</td>
                        <td><a href="{{URL::to('/testpapers') .'/'.$testpaper_id .'/grading/' . $examinee->username }}">打分</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop