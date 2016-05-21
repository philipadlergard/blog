<!DOCTYPE HTML>
<html ng-app="app" ng-controller="globalController">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Your Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="lib/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="customization.css">
</head>
<body>  
    <?php include_once("analyticstracking.php") ?>
    <div id="header">
        <div class="dropdown dropdownMenuDiv">
            <button class="btn btn-default dropdown-toggle dropdownMenuBtn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true">
                <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li ng-repeat="topic in topics"><a ng-class="isCurrentPage(topic.Url)" href="#{{topic.Url}}">{{topic.Name}}</a></li>
                <li><a ng-class="isCurrentPage('/addpost')" href="#/addpost"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
            </ul>
        </div>
        
        <div id="nav">
            <ul>
                <li ng-repeat="topic in topics"><a ng-class="isCurrentPage(topic.Url)" href="#{{topic.Url}}">{{topic.Name}}</a></li>
            </ul>
            
        </div>
        <div class="addPostLink">
            <a ng-class="isCurrentPage('/addpost')" href="#/addpost"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
        </div>
    </div>	
    <div id="content">
        
        <div id="ViewWrapper">
            <div ng-view>
            </div>
        </div>
        
	</div>
	<footer>
        
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.5.0-rc.1/angular-route.min.js"></script>
    <script src="lib/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
    <script src="controllers/mainController.js"></script>
    <script src="controllers/addpostController.js"></script>
</body>
</html>