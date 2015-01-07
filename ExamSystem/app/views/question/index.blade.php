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
                        <input type="checkbox" ng-model="question.selected" ng-change="selected_changed($event,question)">
                         &nbsp;&nbsp;
                        <b>@{{ question.id }}.</b> @{{ type_map[question.type] }} &nbsp;&nbsp;&nbsp;&nbsp;难度:
                        <b>
                            <div ng-class="{true:'glyphicon glyphicon-star',false:'glyphicon glyphicon-star-empty'}[question.difficulty >= 1]"></div>
                            <div ng-class="{true:'glyphicon glyphicon-star',false:'glyphicon glyphicon-star-empty'}[question.difficulty >= 2]"></div>
                            <div ng-class="{true:'glyphicon glyphicon-star',false:'glyphicon glyphicon-star-empty'}[question.difficulty >= 3]"></div>
                            <div ng-class="{true:'glyphicon glyphicon-star',false:'glyphicon glyphicon-star-empty'}[question.difficulty >= 4]"></div>
                            <div ng-class="{true:'glyphicon glyphicon-star',false:'glyphicon glyphicon-star-empty'}[question.difficulty >= 5]"></div>
                        </b>
                        <div class="pull-right" ng-click="delete_question(question)">
                            <span class="glyphicon glyphicon-remove-circle"></span>
                        </div>
                        <a class="pull-right" href="@{{ root_url + '/questions/' + question.id + '/edit' }}" style="margin-right:20px;">编辑</a>
                        <span class="pull-right" style="margin-right: 15px;">@{{ question.labels }}</span>
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