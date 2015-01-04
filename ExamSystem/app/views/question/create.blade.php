@extends('master')
@section('head')
    <style>
        .question_body
        {
            margin-top: 20px;
        }
        #question-choice .form-group.choice
        {
            margin-bottom: 15px;
            position: relative;
        }
        #question-choice .form-group.choice label
        {
            position: absolute;
            top:6px;
        }
        #question-choice .form-group.choice .choice_content
        {
            margin-left: 35px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div ng-controller="createQuestionController">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" ng-class="{true:'active',false:''}[question.type=='choice']"><a href="" ng-click="question.type='choice'">选择题</a></li>
                <li role="presentation" ng-class="{true:'active',false:''}[question.type=='filling']"><a href="" ng-click="question.type='filling'">填空题</a></li>
                <li role="presentation" ng-class="{true:'active',false:''}[question.type=='saq']"><a href="" ng-click="question.type='saq'">简答题</a></li>
            </ul>
            <ul class="question_body" ng-switch on="question.type">
                <li  ng-switch-when="choice">
                    <form id="question-choice">
                        <div class="form-group">
                            <label>题目描述</label>
                            <textarea class="form-control"  rows="5" ng-model="question.choice.content"></textarea>
                        </div>
                        <div class="form-group choice clearfix" ng-repeat="choice in ['A','B','C','D']">
                            <label class="control-label"><input class=""  type="radio" ng-model="question.choice.answer" ng-value="choice"><%choice%>.</label>
                            <div class="choice_content"><input  class="form-control" type="text" ng-model="question.choice.choices[choice]"></div>
                        </div>
                    </form>
                    <p><label>答案:<% question.choice.answer %>.<% question.choice.choices[question.choice.answer] %> </label></p>
                </li>
                <li  ng-switch-when="filling">

                </li>
                <li  ng-switch-when="saq">

                </li>
            </ul>
        </div>

    </div>

@stop
