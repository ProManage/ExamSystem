@extends('master')
@section('title')组卷@stop
@section('head')
    <link href="{{URL::to('/static/css/bootstrap-datetimepicker.min.css')}}" media="all" rel="stylesheet"
          type="text/css">
@stop
@section('content')
    <div class="container">
        <div ng-controller="createTestPaperController">
            <form class="form-inline">
                <input class="form-control" type="text" placeholder="考试名称" ng-model="testpaper.name">
                <label>开始时间:</label><input class="form-control form_datetime" type="date-time" ng-model="testpaper.start_time">
                <label>结束时间:</label><input class="form-control form_datetime" type="date-time" ng-model="testpaper.end_time">
                <button class="btn btn-primary" ng-click="submit_testpaper($event)">提交</button>
            </form>
            <br/>
            <ul class="">
                <li class="" ng-repeat="question in questions" ng-switch on="question.type">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>@{{ question.id }}.</b> @{{ type_map[question.type] }}
                            难度:<b>@{{ question.difficulty }}</b>
                            <label>分值:</label>
                            <span class="" style="height: 10px"><input type="number" ng-model="question.value"></span>
                            <span class="pull-right">@{{ question.labels }}</span></div>

                        <div class="panel-body">
                            @include('question.question_and_answer_body')
                        </div>
                    </div>
                </li>
            </ul>
            <div class="panel panel-default" id="grading_tool">
                <label>总分:</label>
                <h3>@{{ full_score() }}</h3>
            </div>
        </div>
    </div>
    @include('question.selected_questions_fixed')

@stop
@section('extra_script')
    <script src="{{URL::to('/static/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $(".form_datetime").datetimepicker({
            format: 'yyyy-mm-dd hh:ii:ss'
        });
    </script>
@stop