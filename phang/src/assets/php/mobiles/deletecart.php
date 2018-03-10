<?php
include "db.php";
/**header("Access-Control-Allow-Origin: http://localhost:4200");
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$conn=new mysqli('localhost', 'root', '', 'shop');
if($conn->connect_error){
    echo json_encode("Connection failed: " . $conn->connect_error);
    die();
}**/

$data = json_decode(file_get_contents("php://input"));

$sql="DELETE FROM cart WHERE product_id='$data->id'";
$result=$conn->query($sql);

	if ($conn->query($sql) === TRUE) {
$sql="SELECT name, price , color, image, t2.quantity, t2.product_id FROM mobiles t1 LEFT JOIN cart t2 ON t1.id=t2.product_id WHERE t1.id=t2.product_id";

		$result=$conn->query($sql);
		$rows=[];
		while($row=mysqli_fetch_assoc($result)){
			$rows[]=$row;

		}
		$jresult=JSON_ENCODE($rows);
		echo $jresult;



	}
	else {
		echo json_encode(array(
			"status"=>"false",
			"error"=> $conn->error
		));

	}
$conn->close();

 ?>
