<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
$mid=$_POST['menu_id'];
$cid=$_POST['c_id'];
$qty=$_POST['quantity'];
 //$dateAdded = date( 'Y-m-d H:i:s' );
require_once('connect.php');
//$password=password_hash($password,PASSWORD_DEFAULT);

$sql="INSERT INTO `order_table`(`m_id`, `c_id`, `quantity`,`date`)  VALUES('$mid','$cid','$qty',CURRENT_TIMESTAMP)";
if(mysqli_query($con,$sql)){
	//$result["success"]="1";
	//$result["message"]="success";
	//echo json_encode($result);
	//mysqli_close($con);
	
	echo "Order place successfullyy";
} 
else{
	/*$result["success"]="0";
	$result["message"]="error";
	echo json_encode($result);
	mysqli_close($con);
	*/
   echo "Order not placed";
	}
}
?>