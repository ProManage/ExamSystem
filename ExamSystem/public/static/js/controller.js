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
        'answer':{},
        'difficulty':1,
        'labels':""
    };
    $scope.question.type = 'choice';
    $scope.question.choice.answer = "请指定正确答案";

    $scope.submit_question = function ($event) {
        var question  = {
            'type':$scope.question.type,
            'content':$scope.question[$scope.question.type],
            'answer':$scope.question.answer[$scope.question.type],
            'difficulty':$scope.question.difficulty,
            'labels':$scope.question.labels
        };
        $http.post('.',question);
    }
}]);