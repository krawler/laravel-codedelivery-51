/**
 * Created by rafael on 29/08/2016.
 */
angular.module('starter.controllers')
    .controller('ClientOrderCtrl', [
        '$scope','$state', '$ionicLoading', 'Order',
        function ($scope, $state, $ionicLoading, Order) {

                    $scope.items = [];
                     $ionicLoading.show({
                         template: 'Carregando...'
                     })
                     Order.query({id:null}, function(data){
                         $scope.items = data.data;
                         $ionicLoading.hide();
                     }, function(dataError){
                         $ionicLoading.hide();
                     });
                     $scope.addItem = function(item){
                         item.qtd = 1;
                         $cart.addItem(item);
                         $state.go('client.checkout');
                     }
        }]);
