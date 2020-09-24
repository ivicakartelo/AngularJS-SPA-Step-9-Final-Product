<?php
include ('../connection_argument.php');

$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);




$http_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM menu WHERE menu_id = '".$http_data->menu_id."'";

$statement = $conn->prepare($query);
$statement->execute();


?>