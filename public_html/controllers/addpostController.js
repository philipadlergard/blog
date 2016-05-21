angular.module('app').controller('addpostController', ['$scope', '$http', function ($scope, $http) {
    
    $scope.isAuthorized = false;

    $scope.submit = function (isValid) {
        
        if (!isValid) 
        {
            $scope.submitted = true;
            return;
        }
        
        var request = $http({
            method: 'POST',
            url: "api/newPost",
            data: {
                header: $scope.header,
                text: $scope.text,
                url: $scope.url,
                topic: $scope.topic
            }
        });
        
        request.success(function(data, status) {
            $scope.response = data;
        });
    };
    
    $scope.authorize = function (isValid)
    {
        if (!isValid)
        {
            $scope.submitted = true;
            return;
        }
        
        var credentials = {
            user : $scope.userName,
            password : $scope.password
        };
        
        var request = $http({
            method: 'POST',
            url: 'api/authorize',
            data: {
                user: $scope.userName,
                password: $scope.password
            }
        });
        
        request.success(function(response, status) {
            if (response === "true"){
                $scope.isAuthorized = true;
            }
        });
    },
    
    $scope.topicSelected = function (topic){
        $scope.topic = topic;
        $(".topicDropdownBtn").html(topic + ' <span class="caret"></span>');
    }
}])