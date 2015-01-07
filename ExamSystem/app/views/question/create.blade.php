@extends('master')
@section('head')
    <style>
        #type_tab {
            margin-bottom: 20px;
        }

        #question-choice .form-group.choice {
            margin-bottom: 15px;
            position: relative;
        }

        #question-choice .form-group.choice label {
            position: absolute;
            top: 6px;
        }

        #question-choice .form-group.choice .choice_content {
            margin-left: 35px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div ng-controller="QuestionController" ng-init="operate='{{$operate}}'">
            <input id='operate_value'type="hidden" value="{{$operate}}">
            @if ($operate == 'edit')
            <input id='question_id'type="hidden" value="{{$question_id}}">
            @endif
            <ul id="type_tab"class="nav nav-tabs" role="tablist">
                <li role="presentation" ng-class="{true:'active',false:''}[question.type=='choice']"><a href="" ng-click="question.type='choice'">选择题</a></li>
                <li role="presentation" ng-class="{true:'active',false:''}[question.type=='filling']"><a href="" ng-click="question.type='filling'">填空题</a></li>
                <li role="presentation" ng-class="{true:'active',false:''}[question.type=='saq']"><a href="" ng-click="question.type='saq'">简答题</a></li>
            </ul>
            <div>
                <div class="inline"></div>
                <label>题目难度: </label>
                <select class="from-control"  ng-model="question.difficulty" ng-options="dif for dif in [1,2,3,4,5]">
                </select>
                <input class="form-control" type="text" ng-model="question.labels" placeholder="知识点">
            </div>
            <ul ng-switch on="question.type">
                <li  ng-switch-when="choice">
                    <form id="question-choice">
                        <div class="form-group">
                            <label>题目描述</label>
                            <textarea class="form-control"  rows="5" ng-model="question.choice.description" style="resize: none; "></textarea>
                        </div>
                        <div class="form-group choice" ng-repeat="choice in ['A','B','C','D']">
                            <label class="control-label"><input class=""  type="radio" ng-model="question.answer.choice" ng-value="choice">@{{choice}}.</label>
                            <div class="choice_content"><input  class="form-control" type="text" ng-model="question.choice.choices[choice]"></div>
                        </div>
                    </form>
                    <p><label>答案:@{{ question.answer.choice }}.@{{  question.choice.choices[question.answer.choice]  }} </label></p>
                </li>
                <li ng-switch-when="filling">
                    <form id="question-filling">
                        <div class="form-group">
                            <label>题目描述</label>
                            <textarea class="form-control" rows="5" ng-model="question.filling.description" style="resize: none; "></textarea>
                        </div>
                        <div class="form-group">
                            <label>答案:</label>
                            <input class="form-control" type="text" ng-model="question.answer.filling">
                        </div>
                    </form>
                </li>
                <li  ng-switch-when="saq">
                    <form id="question-saq">
                        <div class="form-group">
                            <label>题目描述</label>
                            <textarea class="form-control" rows="5" ng-model="question.saq.description" style="resize: none; "></textarea>
                        </div>
                        <div class="form-group">
                            <label>关键词:</label>
                            <input class="form-control" ng-model="question.answer.saq">
                        </div>
                    </form>
                </li>
            </ul>
            <button class="btn btn-primary btn-lg" ng-click="submit_question($event)">提交</button>
        </div>
    </div>
@stop
