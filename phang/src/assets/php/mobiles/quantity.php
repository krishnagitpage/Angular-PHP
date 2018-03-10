<?php
  include "db.php";

  $data = json_decode(file_get_contents("php://input"));
  if($data->num==-1){
    $sql="UPDATE cart SET quantity=quantity-1 WHERE product_id='$data->id'";
    $result=$conn->query($sql);
  }
  else if($data->num==1){
    $sql="UPDATE cart SET quantity=quantity+1 WHERE product_id='$data->id'";
    $result=$conn->query($sql);
  }

  $sql="SELECT name, price , color, image, t2.quantity, t2.product_id FROM mobiles t1 LEFT JOIN cart t2 ON t1.id=t2.product_id WHERE t1.id=t2.product_id";

  		$result=$conn->query($sql);
  		$rows=[];
  		while($row=mysqli_fetch_assoc($result)){
  			$rows[]=$row;

  		}
  		$jresult=JSON_ENCODE($rows);
  		echo $jresult;



?>
