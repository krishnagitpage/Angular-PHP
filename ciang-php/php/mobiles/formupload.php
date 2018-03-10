<?php 
	header("Access-Control-Allow-Origin: https://localhost:4200/");
	header("Access-Control-Allow-Origin: *");

    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
	
		$data=json_decode(file_get_contents("php://input"));

		var_dump($data);
	
$path = 'uploads/';
  $originalName = $_FILES['file']['name'];
  $ext = '.'.pathinfo($originalName, PATHINFO_EXTENSION);
  $generatedName = md5($_FILES['file']['tmp_name']).$ext;
  $filePath = $path.$originalName.$ext;
if (move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    }
else {
  echo json_encode(
    array('status' => false, 'msg' => 'No file uploaded.')
  );
  exit;
}
 
?>