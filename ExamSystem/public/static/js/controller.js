/**
 * Created by Comzyh on 2015/1/4.
 */
var exsysControllers = angular.module('exsysControllers', []);
exsysControllers.controller('createQuestionController', ['$scope', '$http', function ($scope, $http) {
    $scope.question = {
        'choice':{
            'answer':'',
            'choices':{}
        },
        'filling':{},
        'saq':{}
    };
    $scope.question.type = 'choice';
    $scope.question.choice.answer="请指定正确答案";
}]);