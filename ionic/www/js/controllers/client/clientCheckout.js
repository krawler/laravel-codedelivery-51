/**
 * Created by rafael on 26/08/2016.
 */
angular.module('starter.controllers')
    .controller('ClientCheckoutCtrl',['$scope', '$state', '$cart', '$order','$ionicLoading', '$ionicPopup',
                                      'User', '$cordovaBarcodeScanner', 'Cupom',
                                 function ($scope, $state, $cart, $order, $ionicLoading, $ionicPopup,
                                           User, $cordovaBarcodeScanner, Cupom ) {
                                     

        var cart = $cart.get();
        $scope.items = cart.items;
        $scope.total = cart.total;
        $ionicLoading.hide();

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

            if($scope.cupom.value){
               if($scope.cupom.value > $scope.total){
                   $ionicPopup.alert({
                       title: 'Atenção',
                       template: 'O valor do cupom é maio que o valor total do pedido! Você deve adicionar mais itens no pedido ou remover o cupom'
                   });
                   return;
               }
            }
            angular.forEach(items, function (item) {
                item.product_id = item.id;
            });
            $ionicLoading.show({
                template : 'Carregando...'
            });
            $order.save({id: null}, {items: items}, function (data) {
                $state.go('client.checkout_successful');
                $ionicLoading.hide();
            }, function (responseError) {
                console.log(responseError);
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Pedido não realizado - Tente novamente'
                });
            });
            $state.go('client.view_orders');
        };

        $scope.readBarCode = function(){
            //getValueCupom(9903);
            $cordovaBarcodeScanner
                .scan()
                .then(function(barcodeData) {
                    getValueCupom(barcodeData.text);
                }, function(error) {
                    $ionicLoading.hide();
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Não foi possível ler o código de barras. Tente novamente'
                    });
                });
        };


        $scope.removeCupom = function(){
            $cart.removeCupom();
            $scope.cupom = $cart.get().cupom;
            $scope.total = $cart.getTotalFinal;
        };

        function getValueCupom(code){
            $ionicLoading.show({
               template : 'Obtendo valor do cupom...' + code
            });
            Cupom.get({code:code}, function(data){
                $cart.setCupom(data.data.code,data.data.value);
                $scope.cupom = $cart.get().cupom;
                $scope.total = $cart.getTotalFinal();
                $ionicLoading.hide();
            }, function(responseError){
                $ionicLoading.hide();
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Cupom não encontrado'
                });
            });
            $ionicLoading.hide();
        }
    }]);