<?php
session_start();
if (!empty($_SESSION["username"])) {  
}
//header("Location: index.php");
else
header("Location: ../login.php");
?>

<!DOCTYPE html>
<html lang="en" ng-app="crudApp">  
<head>
<title>Create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
</head>  
<body>
<div class="container">
<h1>Create</h1>
<p><a href="../index.php">Admin</a></p>
<div ng-controller="crudCtrl">


<div ng-show="success">
<div class="alert alert-success" role="alert">
    <a href="#" ng-click="feedBackMsg()">X</a>
    {{feedBack}}
</div>
</div>

    <form ng-submit="createRow()">

    <div class="form-group">
<p>Create <a href="../index.php">Read Update Delete</a> </p> 
</div>

    <div class="form-group">   
        <input class="form-control" type="text" ng-model="addField.name" placeholder="Enter Name" required>
</div>



    <div class="form-group">
        <textarea class="form-control" rows="3" ng-model="addField.content"  placeholder="Enter Content" ng-required="true"></textarea>
     </div>   
     <div class="form-group">
        <input class="form-control" type="text" ng-model="addField.published"  placeholder="Enter Published" ng-required="true" />
</div>
        <button class="btn btn-primary" type="submit">Add</button>
   
    </form>     
</div>
</div>
</body>  
</html>

<script>
var app = angular.module('crudApp', []);

app.controller('crudCtrl', ["$scope", "$http", function($scope, $http){

    $scope.createRow = function(){
        $http({
            method:"POST",
            url:"create.php",
            data:$scope.addField,
        }).success(function(x){
            $scope.success = true;
            $scope.feedBack = x.feedBack;
            $scope.addField = {};           
    });

    $scope.feedBackMsg = function(){
        $scope.success = false;
    };

    }

}]);
</script>
