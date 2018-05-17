<?php 
// getProduct.php
header("Content-Type: application/json");
require "database-config.php";

$sql = "SELECT id_employee, fullname, gender, timework, birth from id";
$result = mysqli_query($conn, $sql);

$message = "";
$status = false;

if(!$result){
	$message = "Can't query data".mysqli_error($conn);
}else{
	if (mysqli_num_rows($result) > 0) {
	    // 2. Các dòng dữ liệu
	    while($row = mysqli_fetch_assoc($result)) {
	        $json[] = $row;
	    }
	    $status = true;
	} else {
	    $message = "0 results";
	}
}
mysqli_close($conn);

$data["account"] = $json;
$data["message"] = $message;
$data["result"] = $status;

echo json_encode($data);

?>