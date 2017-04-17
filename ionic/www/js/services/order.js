/**
 * Created by rafael on 31/08/2016.
 */
angular.module('starter.services')
    .factory('$order', ['$resource','appConfig',function($resource, appConfig){
        return $resource(appConfig.baseUrl + '/api/client/order/:id',{id: '@id'},{
            query:{
                isArray :false
            },
            save:{
               method : 'POST',
                url: appConfig.baseUrl + '/api/client/order/',
                headers: {
                    'Access-Control-Allow-Origin' : '*',
                    'Access-Control-Allow-Methods': 'POST, GET, OPTIONS, PUT',
                    'Access-Control-Allow-Headers': 'Origin, X-Requested-With, Content-Type, Accept'
                }
            },
        });
    }])
    .factory('$orders', ['$resource','appConfig',function($resource, appConfig){
        return $resource(appConfig.baseUrl + '/api/client/order/user',{},{
            query:{
                isArray :false
            }
        });
    }]);
