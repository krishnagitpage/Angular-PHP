<?php
include "db.php";

$sql="SELECT name, price , color, image, t2.quantity, t2.product_id FROM mobiles t1 LEFT JOIN cart t2 ON t1.id=t2.product_id WHERE t1.id=t2.product_id";
$result=$conn->query($sql);
	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}

	$jresult=JSON_ENCODE($rows);
	echo $jresult;
$conn->close();
 ?>
