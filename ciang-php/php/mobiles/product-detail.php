<?php
  include "db.php";

  $data = json_decode(file_get_contents("php://input"));

  $sql="SELECT t1.id, name, brand, image, price, t1.color, os, ram, weight, model_number, screen_size, resolution, internal_storage, frontcam, rearcam, battery, discount, product_id, clock_speed, dimensions, description FROM mobiles t1 INNER JOIN specifications t2 ON t1.id=t2.product_id WHERE t1.id =". $data->id. "";

  $result= $conn->query($sql);

  $rows;
  while($row=mysqli_fetch_assoc($result)){
    $rows=$row;

  }

  $jresult=JSON_ENCODE($rows);
echo ($jresult);

  $conn->close();

?>
