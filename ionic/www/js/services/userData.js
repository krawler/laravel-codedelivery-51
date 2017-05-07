/**
 * Created by rafael on 01/09/2016.
 */
angular.module('starter.services')
    .factory('UserData', ['$localStorage', function($window){
        var key = 'user';
        return {
            set: function(value){
                return $localStorage.setObject(key, value);
            },
            get: function(){
                return $localStorage.getObject(key);
            }
        };
    }]);