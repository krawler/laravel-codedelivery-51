/**
 * Created by rafael on 22/11/2016.
 */
angular.module('starter.controllers')
    .controller('ClientViewOrderCtrl',[
        '$scope', '$state', '$orders', 'User', '$ionicLoading',
        function($scope, $state, $orders, User, $ionicLoading){

            $scope.orders = [];
            $scope.status = ['Pendente', 'A caminho', 'entregue'];

            User.authenticated({include : 'client'}, function(data){

                $orders.query({user: data.data.id, include : 'items'}, function (data) {
                    console.log(data.data);
                    if(angular.isArray(data.data) == false){
                        $scope.orders[0] = data.data;
                    }else{
                        $scope.orders = data.data;
                    }
                    $ionicLoading.hide();
                }, function (responseError) {
                    $ionicLoading.hide();
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Pedido não realizado - Tente novamente'
                    });
                });

            });
            
            $ionicLoading.show({
                template: 'Carregando...'
            });




     }]);

