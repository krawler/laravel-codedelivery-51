/**
 * Created by rafael on 31/08/2016.
 */
angular.module('starter.services')
    .factory('$order', ['$resource','appConfig',function($resource, appConfig){
        return $resource(appConfig.baseUrl + '/api/client/order/:id',{id: '@id'},{
            query:{
                isArray :false
            }
        });
    }]);
