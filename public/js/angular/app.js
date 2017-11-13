var app = angular.module('notasDebitoModule', ['angular.viacep'], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});