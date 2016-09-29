angular.module('starter.controllers')
    .controller('LoginCtrl', [
        '$scope', 'OAuth', '$cookies', '$ionicPopup', '$state', function ($scope, OAuth, $cookies, $ionicPopup, $state) {

        $scope.user = {
            username: '',
            password: '',
            grant_type : 'password',
            client_secret : 'secret'
        }

        $scope.login = function () {
            OAuth.getAccessToken($scope.user)
                .then(function(data){
                   $state.go('client.checkout');
                }, function (responseError) {
                    $ionicPopup.alert({
                        title : 'Advertência',
                        template : 'Login e/ou senha inválidos'
                    });
                });
        }
    }]);
