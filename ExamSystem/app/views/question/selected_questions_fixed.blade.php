<div id="selected_questions_fixed" ng-class="{true:'collapse',false:''}[collapse]"
     ng-controller="selectQuestionController" ng-show="!isEmpty(selected_questions)">
    <div class="panel panel-info">
        <div class="panel-heading clearfix">
            <h4 class="panel-title pull-left">已选择的题号</h4>
            <a class="panel-title pull-right" href="" ng-click="collapse = !collapse"><span
                        class="glyphicon pull-right" ng-class="{true:'glyphicon-chevron-right',false:'glyphicon-chevron-left'}[collapse]"></span></a>
            <button class="btn btn-default btn-xs pull-right" ng-click="clear_selected($event)">清空</button>
        </div>
        <div class="panel-body clearfix">
            <span class="pull-left selectd_question" ng-repeat="(qid,useless) in selected_questions"> @{{ qid }}</span>
        </div>
    </div>

</div>