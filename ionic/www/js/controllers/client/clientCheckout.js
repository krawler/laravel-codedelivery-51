/**
 * Created by rafael on 26/08/2016.
 */
angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl',['$scope', '$state', '$cart', '$order','$ionicLoading', '$ionicPopup',
                                 function ($scope, $state, $cart, $order, $ionicLoading, $ionicPopup) {
        var cart = $cart.get();
        $scope.items = cart.items;
        $scope.total = cart.total;
        $scope.removeItem = function(i){
          $cart.removeItem(i);
          $scope.items.splice(i,1);
          $scope.total = $cart.get().total;
        };
        $scope.openProductDetail = function(i){
          $state.go('client.checkout_item_detail',{index : i});
        };
        $scope.openListProducts = function(){
            $state.go('client.view_products')
        };
        $scope.save = function(){
            var items = angular.copy($scope.items);
            angular.forEach(items, function (item) {
                item.product_id = item.id;
            });
            $ionicLoading.show({
                template : 'Carregando...'
            });
            $order.query({id: null}, {items: items}, function (data) {
                console.log(data);
                $ionicLoading.hide();
            }, function (responseError) {
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Pedido não realizado - Tente novamente'
                });
            });
        };
    }]);