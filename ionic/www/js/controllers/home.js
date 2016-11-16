/**
 * Created by rafael on 16/08/2016.
 */
angular.module('starter.controllers')
    .controller('HomeCtrl', [
        '$scope','$state','User',
        function ($scope, $state, User) {
             User.authenticated({}, function(data){
                 $scope.username = data.data.name;
             });
        }]);

