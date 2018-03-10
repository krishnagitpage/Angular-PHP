<?php
//header("Access-Control-Allow-Origin: https://phang.herokuapp.com");
header("Access-Control-Allow-Origin: https://localhost:4200");

    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$conn=new mysqli("localhost", "root", "", "shop");

/**
$conn=new mysqli('sql11.freemysqlhosting.net', 'sql11223290', 'ELNdUza67w', 'sql11223290');
if($conn->connect_error){
    echo json_encode("Connection failed: " . $conn->connect_error);
    die();
}
**/
 ?>
