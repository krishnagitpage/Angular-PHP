<?php
include "db.php";

  $sql="SELECT t1.id, name, brand, t1.image, price, t1.color, os, ram, rearcam, internal_storage, discount FROM mobiles t1 INNER JOIN specifications t2 ON t1.id=t2.product_id WHERE t1.id >= 1 ";



	$result= $conn->query($sql);

	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;

	}

	$jresult=JSON_ENCODE($rows);
	echo $jresult;

	$conn->close();

?>
