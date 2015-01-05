/**
 * Created by Comzyh on 2015/1/4.
 */
var exsysControllers = angular.module('exsysControllers', []);
exsysControllers.controller('createQuestionController', ['$scope', '$http', function ($scope, $http) {
    $scope.question = {
        'choice': {
            'choices': {}
        },
        'filling': {},
        'saq': {},
        'answer': {},
        'difficulty': 1,
        'labels': ""
    };
    $scope.question.type = 'choice';
    $scope.submit_question = function ($event) {
        var question = {
            'type': $scope.question.type,
            'content': $scope.question[$scope.question.type],
            'answer': $scope.question.answer[$scope.question.type],
            'difficulty': $scope.question.difficulty,
            'labels': $scope.question.labels
        };
        $http.post('.', question).success(function () {
            window.location.href = "../questions/"
        });
    }
}]);

exsysControllers.controller('listQuestionController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    $scope.questions = [];
    $scope.qid_question_map = {}
    $http.get("").success(function (data) {
        for (var i in data) {
            data[i].content = JSON.parse(data[i].content);
            data[i].answer = JSON.parse(data[i].answer);
            data[i].selected = $rootScope.selected_questions[data[i].id];
            $scope.qid_question_map[data[i].id] = data[i];
        }
        $scope.questions = data;
    });
    $scope.type_map = {
        'choice': '选择题',
        'filling': '填空题',
        'saq': '简答题'
    };
    $scope.selected_changed = function ($event, question) {
        $rootScope.$broadcast('selected_questions_changed', question.id, question.selected);
    }
    $scope.$on('selected_questions_changed', function ($event, qid, add) {
        $scope.qid_question_map[qid].selected = add;
    });
}]);
exsysControllers.controller('selectQuestionController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    $scope.isEmpty = function (obj) {
        for (var key in obj) {
            return false;
        }
        return true;
    }
    $scope.clear_selected = function () {
        var qids = [];
        for (var key in $rootScope.selected_questions)
            qids.push(key);
        for (var i in qids)
            $rootScope.$broadcast('selected_questions_changed', qids[i], false);
    }
    $scope.collapse = true
    $scope.toggle_collapse = function () {
        $scope.collapse = !$scope.collapse;
    };
}]);
exsysControllers.controller('createTestPaperController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
    //$scope.qid_question_map = {};
    $scope.questions = [];
    $http.get($rootScope.root_url + "/questions").success(function (data) {
        var questions = [];
        for (var i in data) {
            data[i].content = JSON.parse(data[i].content);
            data[i].answer = JSON.parse(data[i].answer);
            data[i].selected = $rootScope.selected_questions[data[i].id];
            data[i].value = 2;
            if (data[i].selected) {
                questions.push(data[i]);
            }
        }
        questions.sort(function (a, b) {
            if (a.type != b.type)
                return "choicefillingsaq".indexOf(a.type) - "choicefillingsaq".indexOf(b.type)
            else
                return a.id - b.id;
        });
        $scope.questions = questions;
    });


}]);
