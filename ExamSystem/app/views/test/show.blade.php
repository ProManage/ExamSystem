@extends('master')
@section('title')考试@stop
@section('content')
    <div class="container">
        <ul class="container" ng-controller="testController">
            <li class="" ng-repeat="question in questions" ng-switch on="question.type">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>@{{ question.placement + 1 }}.</b> @{{ type_map[question.type] }}
                        <label>分值: @{{ question.value  }}</label>
                    </div>
                    <div class="panel-body">
                        <div ng-switch-when="choice">
                            <p class="question-desc">@{{ question.content.description }}</p>

                            <div class="choice-choice" ng-repeat="choice in ['A','B','C','D']">
                                <div class="choice_content">
                                    <b><input type="radio" ng-model="question.answer" ng-change="update_answer(question)"
                                                                        ng-value="choice">@{{choice}}.</b>
                                    @{{ question.content.choices[choice] }}
                                </div>
                            </div>
                        </div>
                        <div ng-switch-when="filling">
                            <p class="question-desc">@{{ question.content.description }}</p>
                            <input class="form-control" type="text" ng-model="question.answer" placeholder="答案" ng-blur="update_answer(question)">
                        </div>
                        <div ng-switch-when="saq">
                            <p class="question-desc">@{{ question.content.description }}</p>
                            <textarea class="form-control" rows="5" ng-model="question.answer" style="resize: none; " ng-blur="update_answer(question)"></textarea>
                        </div>
                    </div>
                </div>
            </li>
            <div class="panel panel-default" id="grading_tool">
                <label>结束时间:</label>
                <p>@{{ testinfo.end_time }}</p>
            </div>
        </ul>
        <a href="../" class="btn btn-primary">交卷</a>

    </div>
@stop