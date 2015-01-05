/**
 * Created by Comzyh on 2015/1/4.
 */
'use strict';
var exsys = angular.module('exsys', [
    //'ngRoute',
    'exsysControllers',
    'ngAnimate',
    //'globel',
    //'serverRes',
    //'workxfilter'
]);
//exsys.config(function($interpolateProvider) {
//    $interpolateProvider.startSymbol('<%');
//    $interpolateProvider.endSymbol('%>');
//});

exsys.config(['$httpProvider', function ($httpProvider) {
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
}]);

exsys.run(["$rootScope", '$http', function ($rootScope, $http) {
    $rootScope.selected_questions = {
        1: null,
        3: null
    }
    $rootScope.selected_questions = localStorage['selected_questions'] && JSON.parse(localStorage['selected_questions']) || {};
    $rootScope.$on('selected_questions_changed', function ($event,qid, add) {
        if (add == true)
            $rootScope.selected_questions[qid] = true;
        else
            delete $rootScope.selected_questions[qid];
        //localStorage['selected_questions'] = JSON.stringify($rootScope.selected_questions);
    });
    $rootScope.$watch('selected_questions', function() {
        localStorage['selected_questions'] = JSON.stringify($rootScope.selected_questions);
        //console.log('$watch : selected_questions changed');
    },true);
}]);