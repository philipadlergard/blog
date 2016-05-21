angular.module('app').controller('mainController', ['$scope', '$http', 'topic', function ($scope, $http, topic) {
    
    function post(data) {
        this.header = data.Header;
        this.url = data.Url;
        this.text = data.Text;
    }
    
    $scope.posts = [];
    $http({
        url: '/api/getPostsByTopic/' + topic,
        method: 'GET',
    }).then(function(response) {
            if (response.data !== 'null')
            {
                angular.forEach(response.data, function (value, key) {
                        $scope.posts.push(new post(value));
                        })
            }}, function(response) {
                console.log(response.data);
            });
}])