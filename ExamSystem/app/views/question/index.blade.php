@extends('master')
@section('head')
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
                        <div ng-switch-when="choice">
                            <p>@{{ question.content.description }}</p>
                            <div class="clearfix">
                                <div class="choice-choice" ng-repeat="choice in ['A','B','C','D']"
                                     ng-class="{true:'choice-choice-correct',false:''}[question.answer == choice]">
                                    <span>@{{ choice }}. </span>@{{ question.content.choices[choice] }}
                                </div>
                            </div>
                        </div>
                        <div ng-switch-when="filling">
                            <p>@{{ question.content.description }}</p>
                            <p><b>答案:</b> @{{ question.answer }}</p>
                        </div>
                        <div ng-switch-when="saq">
                            <p>@{{ question.content.description }}</p>
                            <p><b>关键词:</b> @{{ question.answer }}</p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    @include('question.selected_questions_fixed')

@stop