/**
 * Created by rafael on 26/08/2016.
 */
angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl',['$scope', '$state', '$cart', '$order','$ionicLoading', '$ionicPopup', 'User',
                                 function ($scope, $state, $cart, $order, $ionicLoading, $ionicPopup, User) {

        User.authenticated({include : 'client'}, function(data){
            console.log(data.data);
        }, function(responseError){

        });

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
            $state.go('client.view_orders');
        };
        /*
        $scope.readBarCode = function(){
            $cordovaBarcodeScanner
                .scan()
                .then(function(barcodeData) {
                    getValueCupom(barcodeData.text);
                }, function(error) {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Não foi possível ler o código de barras. Tente novamente'
                    });
                });
        };
        */

        $scope.removeCupom = function(){
            $cart.removeCupom();
            $scope.cupom = $cart.get().cupom;
            $scope.total = $cart.getTotalFinal;
        };

        function getValueCupom(code){
            $ionicLoading.show({
               template : 'Carregando...'
            });
            Cupom.get({code:code}, function(data){
                $cart.setCupom(data.code,data.value);
                $scope.cupom = $cart.get().cupom;
                $scope.total = $cart.getTotalFinal;
                $ionicLoading.hide();
            }, function(responseError){
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Cupom não encontrado'
                });
            });
        }
    }]);