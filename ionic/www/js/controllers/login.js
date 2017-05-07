angular.module('starter.controllers')
    .controller('LoginCtrl', [
        '$scope', 'OAuth', '$cookies', '$ionicPopup', '$state', 'User', 'UserData', 'OAuthToken',
        function ($scope, OAuth, $cookies, $ionicPopup, $state, User, UserData, OAuthToken) {

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
                    UserData.set(data.data);
                    $state.go('client.checkout');
                }, function (responseError) {
                    UserData.set(null);
                    $localStorage.set('user', null);
                    OAuthToken.removeToken();
                    $ionicPopup.alert({
                        title : 'Advertência',
                        template : 'Login e/ou senha inválidos'
                    });
                });
        }
    }]);
