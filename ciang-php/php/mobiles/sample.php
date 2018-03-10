<?php
include "db.php";


$data = json_decode(file_get_contents("php://input"));

  $sql="SELECT t1.id, name, brand, image, price, t1.color, os, ram, rearcam, internal_storage, discount FROM mobiles t1 INNER JOIN specifications t2 ON t1.id=t2.product_id WHERE t1.id >= 1 ";

    if($data->minprice):
        $sql.= " AND price >=  ".$data->minprice." ";
    endif;
    if($data->maxprice):
      $sql.= " AND price <=  ".$data->maxprice." ";
    endif;
    if($data->brand):
      $sql.=" AND brand IN ('".implode("','",$data->brand)."')";
    endif;
    if($data->color):
      $sql.=" AND t1.color IN ('".implode("','",$data->color)."')";
    endif;
    if($data->frontcam){
      foreach ($data->frontcam as $key) {
        $sql.=" AND t2.frontcam >=  ".$key." ";
      }
    }




$result= $conn->query($sql);

$rows=[];
while($row=mysqli_fetch_assoc($result)){
  $rows[]=$row;

}

$jresult=JSON_ENCODE($rows);
echo $jresult;

$conn->close();
 ?>
