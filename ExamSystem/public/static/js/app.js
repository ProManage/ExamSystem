/**
 * Created by Comzyh on 2015/1/4.
 */
'use strict';
var exsys = angular.module('exsys', [
    //'ngRoute',
    'exsysControllers',
    //'globel',
    //'serverRes',
    //'workxfilter'
]);
//exsys.config(function($interpolateProvider) {
//    $interpolateProvider.startSymbol('<%');
//    $interpolateProvider.endSymbol('%>');
//});

exsys.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
}]);