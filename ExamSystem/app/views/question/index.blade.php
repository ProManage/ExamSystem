@extends('master')
@section('title')
    题目列表
@stop
@section('content')
    <div class="container">
        <ul class="" ng-controller="listQuestionController">
            <li class="" ng-repeat="question in questions" ng-switch on="question.type">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>@{{ question.id }}.</b> @{{ type_map[question.type] }} 难度:<b>@{{ question.difficulty }}</b>
                        <input type="checkbox" ng-model="question.selected" ng-change="selected_changed($event,question)">
                        <span class="pull-right">@{{ question.labels }}</span></div>
                    <div class="panel-body">
                        @include('question.question_and_answer_body')
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @include('question.selected_questions_fixed')

@stop