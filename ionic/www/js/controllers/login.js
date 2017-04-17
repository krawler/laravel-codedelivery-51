angular.module('starter.controllers')
    .controller('LoginCtrl', [
        '$scope', 'OAuth', '$cookies', '$ionicPopup', '$state',
        function ($scope, OAuth, $cookies, $ionicPopup, $state) {

        $scope.user = {
            username: '',
            password: '',
            grant_type : 'password',
            client_secret : 'secret'
        }

        $scope.login = function () {
            var promisse = OAuth.getAccessToken($scope.user);
            promisse
                .then(function(data){
                    return User.authenticated({include: 'client'}).$promise;
                })
                .then(function(data){
                    $localStorage.set('user', data.data);
                    $state.go('client.checkout');
                }, function (responseError) {
                    $localStorage.set('user', null);
                    OAuthToken.removeToken();
                    $ionicPopup.alert({
                        title : 'Advertência',
                        template : 'Login e/ou senha inválidos'
                    });
                });
        }
    }]);
