// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter.controllers',[]);
angular.module('starter.services',[]);

angular.module('starter', ['ionic', 'starter.controllers', 'starter.services', 'angular-oauth2', 'ngResource'])

.constant('appConfig',{
   baseUrl : 'http://192.168.1.100:8000'
})

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

.config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig) {

  OAuthProvider.configure({
    baseUrl: appConfig.baseUrl,
    clientId: 'appid01',
    clientSecret: 'secret', // optional
    grantPath: '/oauth/access_token',
    revokePath: "/oauth/revoke"
  });

  OAuthTokenProvider.configure({
    name: 'token',
    options: {
      secure: false
    }
  });

  $stateProvider.state('login',{
    url : '/login',
    templateUrl : 'templates/login.html',
    controller : 'LoginCtrl'
  })
    .state('main',{
      url : '/',
      templateUrl : 'templates/main.html'
    })

    .state('home',{
      url : '/home',
      templateUrl : 'templates/home.html',
      controller: function ($scope) {

      }
    })

    .state('client', {
      abstract : true,
      url : '/client',
      template: '<ion-nav-view/>'
    })

    .state('client.checkout', {
      cache: false,
      url : '/checkout',
      templateUrl: 'templates/client/client_checkout.html',
      controller : 'ClientCheckoutCtrl'
    })

    .state('client.checkout_item_detail', {
      url : '/checkout/detail/:index',
      templateUrl: 'templates/client/checkout_item_detail.html',
      controller : 'ClientCheckoutDetailCtrl'
    })

    .state('client.checkout_sucessful', {
      cache: false,
      url : '/checkout/sucessful',
      templateUrl: 'templates/client/checkout_sucessful.html',
      controller : 'ClientCheckoutSucessfulCtrl'
    })

    .state('client.view_products', {
      url : '/view_products',
      templateUrl: 'templates/client/view_products.html',
      controller : 'ClientViewProductCtrl'
    })

    $urlRouterProvider.otherwise('/login');
});