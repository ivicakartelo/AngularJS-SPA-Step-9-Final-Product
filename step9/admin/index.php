<?php
session_start();
if (!empty($_SESSION["username"])) {  
}
//header("Location: index.php");
else
header("Location: login.php?message=2");
?>

<!DOCTYPE html>
<html lang="en" ng-app="crudApp">  
<head>
<title>Admin</title>
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

<h1>Admin</h1>
<p><a href="../index.php">Home</a> <a href="logout.php">Logout</a></p>

<div class="form-group">
<p><a href="c/index.php">Create</a> Read Update Delete</p> 
</div>
<div ng-controller="crudCtrl" ng-init="allRecords()">
<table class="table">
<thead>
<tr>
<th>Name</th>
<th>Content</th>
<th>Published</th>
</tr>
</thead>
<tbody>

<tr ng-repeat="x in columnsNames" ng-include="crudTemplate(x)">
</tr>
</tbody>
</table>

<!-- READ TEMPLATE -->               
<script type="text/ng-template" id="crudTable">
<td>{{x.name}}</td>
<td>{{x.content}}</td>
<td>{{x.published}}</td>
<td>
<button class="btn btn-primary" type="button" ng-click="visibleEditForm(x)">Edit</button>
<button class="btn btn-primary" type="button" ng-click="deleteRow(x.menu_id)">Delete</button>
</td>
</script>
<!-- READ TEMPLATE THE END -->

<!-- EDIT TEMPLATE -->
                <script type="text/ng-template" id="editForm">
                    <td><input class="form-control" type="text" ng-model="formEdit.name" /></td>
                    <td><textarea class="form-control" ng-model="formEdit.content" /></textarea></td>
                    <td><input class="form-control" type="text" ng-model="formEdit.published" /></td>
                    <td>
                        <input type="hidden" ng-model="formEdit.x.menu_id" />
                        <button class="btn btn-secondary" type="button" ng-click="updateData()">Update</button>
                        <button class="btn btn-secondary" type="button" ng-click="cancel()">Cancel</button>
                    </td>
                </script>  
<!-- EDIT TEMPLATE THE END -->
</div>
</div>
</body>  
</html>

<script>
var app = angular.module('crudApp', []);

app.controller('crudCtrl', ["$scope", "$http", function($scope, $http){

    $scope.formEdit = {};

    $scope.crudTemplate = function(x){
        
        if (x.menu_id === $scope.formEdit.menu_id)
        {
            return 'editForm';
        }
        return 'crudTable';
    };

    $scope.allRecords = function(){
        $http.get('read.php').success(function(x){
            $scope.columnsNames = x;
        });
    };

    $scope.visibleEditForm = function(x) {
        $scope.formEdit = angular.copy(x);
    };

    $scope.updateData = function(){
        $http({
            method:"POST",
            url:"update.php",
            data:$scope.formEdit,
        }).success(function(x){
            $scope.success = true;
            $scope.feedBack = x.feedBack;
            $scope.allRecords();
            $scope.formEdit = {};
        });
    };

    $scope.cancel = function(){
        $scope.formEdit = {};
    };

    $scope.deleteRow = function(menu_id){
        if(confirm("Are you permanently delete it?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'menu_id':menu_id}
            }).success(function(x){
                $scope.success = true;
                $scope.feedBack = x.feedBack;
                $scope.allRecords();
            }); 
        }
    };

}]);

</script>
