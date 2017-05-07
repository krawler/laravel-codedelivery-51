/**
 * Created by rafael on 30/03/2017.
 */
/**
 * Created by rafael on 29/08/2016.
 */
angular.module('starter.controllers')
    .controller('ClientMenuCtrl', [
        '$scope','$state', '$ionicLoading', 'UserData',
        function ($scope, $state, $ionicLoading, UserData) {

            $scope.user = UserData.get();

        }]);
