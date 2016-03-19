var app = angular.module('app', ['ngRoute']);

app.controller('globalController', ['$scope', '$location', '$http', function ($scope, $location, $http) {
    
    $scope.topics = [];
    
    $scope.isCurrentPage = function (path) {
        if ($location.path() === path) {
            return 'currentNav';
        }
         else {
            return '';
        }
    }
    
    $http.get('api/getTopics').then(function(response){
        angular.forEach(response.data, function (value, key) {
            $scope.topics.push(value);
            })
    })
}]);

app.config(function ($routeProvider) {
    
    $routeProvider
        .when('/', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return '.Net'}
            }
        })
        .when('/.net', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return '.Net'}
            }
        })
        .when('/php', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return 'PHP'}
            }
        })
        .when('/web', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return 'Web'}
            }
        })
        .when('/devtools', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return 'Dev-Tools'}
            }
        })
        .when('/javascript', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return 'Javascript'}
            }
        })
        .when('/css', {
            templateUrl: 'pages/main.html',
            controller: 'mainController',
            resolve: {
                topic: function (){ return 'CSS'}
            }
        })
        .when('/addpost', {
            templateUrl: 'pages/addpost.html',
            controller: 'addpostController'
    });
});

