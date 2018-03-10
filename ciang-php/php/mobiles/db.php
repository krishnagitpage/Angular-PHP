<?php
header("Access-Control-Allow-Origin: https://phang.herokuapp.com");
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Origin: http://localhost:4200");
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

//$conn=new mysqli("localhost", "root", "", "shop");
//mysql://b05df984a08e3f:6c86f70e@us-cdbr-iron-east-05.cleardb.net/heroku_a4867a5c36bf4ae?reconnect=true

$conn=new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b05df984a08e3f', '6c86f70e', 'heroku_a4867a5c36bf4ae');
if($conn->connect_error){
    echo json_encode("Connection failed: " . $conn->connect_error);
    die();
}


 ?>
