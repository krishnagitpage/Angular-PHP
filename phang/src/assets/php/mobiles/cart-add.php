<?php
include "db.php";
$data = json_decode(file_get_contents("php://input"));

$id=$data->id;

$sql="SELECT product_id FROM cart WHERE product_id = '$data->id' ";
$result=$conn->query($sql);
if(mysqli_num_rows($result)==0)
{
  if(!empty($data->id)){
  $sql="INSERT INTO cart (product_id, quantity) VALUES ('$data->id', 1 )";
  }
  if ($conn->query($sql) === TRUE) {

      echo json_encode("Product Added");
  } else {
      echo json_encode($conn->error);
  }


}
else{
  $sql="UPDATE cart SET quantity = quantity+1 WHERE product_id='$data->id'";
  if ($conn->query($sql) === TRUE) {

      echo json_encode("Quantity Updated");
  } else {
      echo json_encode($conn->error);
  }

}



$conn->close();
 ?>
