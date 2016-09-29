/**
 * Created by rafael on 19/09/2016.
 */
angular.module('starter.controllers')
    .controller('ClientCheckoutSucessfulCtrl', [
        '$scope','$state', '$cart',
        function ($scope, $state, $cart) {
           var cart = $cart.get();
           $scope.items = cart.items;
           $scope.total = $cart.getTotalFinal();
           $cart.clear();

           $scope.openListOrder = function () {

           };
        }]);
