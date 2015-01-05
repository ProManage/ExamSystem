<div id="selected_questions_fixed" class="fade-animation" ng-controller="selectQuestionController" ng-show="!isEmpty(selected_questions)">
    <div class="panel panel-info">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left">已选择的题号</h3>
            <button class="btn btn-default btn-xs pull-right" ng-click="clear_selected($event)">清空</button>
        </div>
        <div class="panel-body clearfix">
            <span class="pull-left selectd_question"  ng-repeat="(qid,useless) in selected_questions"> @{{ qid }}</span>
        </div>
    </div>

</div>