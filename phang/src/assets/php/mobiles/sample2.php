<?php

header("Access-Control-Allow-Origin: http://localhost:4200");

header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');



$data = json_decode(file_get_contents("php://input"));

echo json_encode($data);

 ?>
