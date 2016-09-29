/**
 * Created by rafael on 26/08/2016.
 */
angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl',['$scope', '$state', '$cart', '$order','$ionicLoading', '$ionicPopup','$cupom',
                                 function ($scope, $state, $cart, $order, $ionicLoading, $ionicPopup, $cupom) {

        var cart = $cart.get();
        $scope.cupom = cart.cupom;
        $scope.items = cart.items;
        $scope.total = $cart.getTotalFinal();
        $scope.removeItem = function(i){
          $cart.removeItem(i);
          $scope.items.splice(i,1);
          $scope.total = $cart.getTotalFinal();
        };
        $scope.openProductDetail = function(i){
          $state.go('client.checkout_item_detail',{index : i});
        };
        $scope.openListProducts = function(){
            $state.go('client.view_products')
        };

        $scope.save = function(){
            var items = {items: angular.copy($scope.items)};
            angular.forEach(items.items, function (item) {
                item.product_id = item.id;
            });
            $ionicLoading.show({
                template : 'Carregando...'
            });
            if($scope.cupom.value){
                items.cupom_code = $scope.cupom.code;
            }
            $order.query({id: null}, items, function (data) {
                $state.go('client.checkout_sucessful');
                $ionicLoading.hide();
            }, function (responseError) {
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Pedido não realizado - Tente novamente'
                });
            });
        };

        $scope.readBarCode = function () {
            getValueCupom(3476);
        };

        $scope.removeCupom = function() {
            $cart.removeCupom();
            $scope.cupom = $cart.get().cupom;
            $scope.total = $cart.getTotalFinal();
        };

        function getValueCupom(code){
            $ionicLoading.show({
                template : 'Carregando...'
            });
            $cupom.get({code: code}, function(data){
                $cart.setCupom(data.code,data.value);
                $scope.cupom = $cart.get().cupom;
                $scope.total = $cart.getTotalFinal();
                $ionicLoading.hide();
            }, function (responseError) {
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Cupom não foi verificado com sucesso'
                });
            });
        }
    }]);