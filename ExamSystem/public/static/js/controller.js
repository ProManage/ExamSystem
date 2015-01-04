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

exsysControllers.controller('listQuestionController', ['$scope', '$http', function ($scope, $http) {
    $scope.questions = [];
    console.log($scope);
    $http.get("").success(function (data) {
        for (var i in data) {
            data[i].content = JSON.parse(data[i].content);
            data[i].answer = JSON.parse(data[i].answer);
        }
        $scope.type_map = {
            'choice': '选择题',
            'filling': '填空题',
            'saq': '简答题'
        }
        $scope.questions = data;
    })

}]);