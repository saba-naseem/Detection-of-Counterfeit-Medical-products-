<?php
$productid= $_POST['productid'];
$qrcode= $_POST['qrcode'];
$description= $_POST['description'];

$conn = new mysqli('localhost', 'root', '','supplychain');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);

}else{
	$stmt = $conn->prepare("insert into complaintbox(productid, qrcode, description) values(?,?,?)");
	$stmt->bind_param("iss", $productid, $qrcode, $description);
	$stmt->execute();
	echo  "Thank You for letting us know!";
	$stmt->close();
	$conn->close();
}


?>
