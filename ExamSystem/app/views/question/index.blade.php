@extends('master')
@section('title')
    题目列表
@stop
@section('content')
    <div class="container" ng-controller="listQuestionController">
        <form class="form-inline form-bottom-margin">
            <div class="form-group">
                <label>筛选关键字:</label>
                    <input class="form-control" type="text" ng-model="keywords">
            </div>
        </form>
        <ul class="">
            <li class="question-li" ng-repeat="question in questions | filter:keywords" ng-switch on="question.type">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>@{{ question.id }}.</b> @{{ type_map[question.type] }} 难度:<b>@{{ question.difficulty }}</b>
                        <input type="checkbox" ng-model="question.selected"
                               ng-change="selected_changed($event,question)">
                        <span class="pull-right">@{{ question.labels }}</span>
                    </div>
                    <div class="panel-body">
                        @include('question.question_and_answer_body')
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @include('question.selected_questions_fixed')

@stop