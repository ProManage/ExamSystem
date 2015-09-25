@extends('master')
@section('title')判卷@stop
@section('content')
    <div class="container" ng-controller="gradingController">
        <div>
            <label id="student_id_label">学号: <span>@{{ examinee.student_id }}</span></label>
        </div>
        <ul>
            <li class="" ng-repeat="question in questions" ng-switch on="question.type">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>@{{ question.placement + 1 }}.</b> @{{ type_map[question.type] }}
                        <label>评分:</label><span class="" style="height: 10px"><input type="number" ng-model="question.score" max="@{{ question.value }}"></span>
                        <label>分值: @{{ question.value  }}</label>
                    </div>
                    <div class="panel-body">
                        <div ng-switch-when="choice">
                            <p class="question-desc">@{{ question.content.description }}</p>

                            <div class="choice-choice" ng-repeat="choice in ['A','B','C','D']">
                                <div class="choice_content" ng-class="{true:'choice-choice-correct',false:''}[question.correct_answer == choice]">
                                    <b><input type="radio" ng-model="question.answer" ng-value="choice"disabled>@{{choice}}.</b>
                                    @{{ question.content.choices[choice] }}
                                </div>
                            </div>
                        </div>
                        <div ng-switch-when="filling">
                            <p class="question-desc">@{{ question.content.description }}</p>
                            <p><input class="form-control" type="text" ng-model="question.answer" placeholder="答案" readonly></p>
                            <p><b>标准答案:</b> @{{ question.correct_answer }}</p>
                        </div>
                        <div ng-switch-when="saq">
                            <p class="question-desc">@{{ question.content.description }}</p>
                            <p><textarea class="form-control" rows="5" ng-model="question.answer" style="resize: none; " ng-blur="update_answer(question)" readonly></textarea></p>
                            <p><b>关键词:</b> @{{ question.correct_answer }}</p>
                        </div>
                        <div ng-switch-when="programing">
                            <p class="question-desc">@{{ question.content.description }}</p>
                            <p><textarea class="form-control" rows="5" ng-model="question.answer" style="resize: none;  font-family:  Monaco, Menlo, Consolas, 'Courier New', monospace;" ng-blur="update_answer(question)" readonly></textarea></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="panel panel-default" id="grading_tool">
            <label>总分:</label>
            <h3>@{{ total_score() }}/@{{ full_score }}</h3>
            <button class="btn btn-default" ng-click="auto_mark()">辅助判题</button>
            <br/>
            <button class="btn btn-primary" ng-click="submit_score()">提交分数</button>
        </div>
    </div>

@stop