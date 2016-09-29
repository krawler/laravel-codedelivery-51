/**
 * Created by rafael on 31/08/2016.
 */
angular.module('starter.services')
    .factory('$cupom', ['$resource','appConfig',function($resource, appConfig){
        return $resource(appConfig.baseUrl + '/api/cupom/:code',{id: '@code'},{
            query:{
                isArray :false
            }
        });
    }]);
