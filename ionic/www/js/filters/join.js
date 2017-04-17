/**
 * Created by rafael on 14/02/2017.
 */
angular.module('starter.filters')
    .filter('join', function(){
        return function(input, joinStr){
            return input.join(joinStr)
        };
    });
