/**
 * Created by rafael on 22/11/2016.
 */
angular.module('starter.controllers')
    .controller('ClientViewOrderCtrl',[
        '$scope', '$state', '$order', 'User', '$ionicLoading', '$stateParams',
        function($scope, $state, $order, User, $ionicLoading, $stateParams){

           $scope.orders = {}

            $ionicLoading.show({
                template: 'Carregando...'
            });

            $order.get({id: $stateParams.id, include: "items,cupom"}, function(data){
                $scope.orders = data.data;

                $ionicLoading.hide();
            }, function(responseError){
                $ionicLoading.hide();
            })

     }]);

