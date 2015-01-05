<div ng-switch-when="choice">
    <p class="question-desc">@{{ question.content.description }}</p>
    <div class="clearfix">
        <div class="choice-choice" ng-repeat="choice in ['A','B','C','D']"
             ng-class="{true:'choice-choice-correct',false:''}[question.answer == choice]">
            <span>@{{ choice }}. </span>@{{ question.content.choices[choice] }}
        </div>
    </div>
</div>
<div ng-switch-when="filling">
    <p class="question-desc">@{{ question.content.description }}</p>
    <p><b>答案:</b> @{{ question.answer }}</p>
</div>
<div ng-switch-when="saq">
    <p class="question-desc">@{{ question.content.description }}</p>
    <p><b>关键词:</b> @{{ question.answer }}</p>
</div>