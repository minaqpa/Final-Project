<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$email=$_POST['email'];
$uname=$_POST['uname'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
require_once('connect.php');
//$password=password_hash($password,PASSWORD_DEFAULT);

$sql="INSERT INTO `customer`(`name`, `email`, `uname`, `password`, `mobile`) VALUES('$name','$email','$uname','$password','$mobile')";
if(mysqli_query($con,$sql)){
	//$result["success"]="1";
	//$result["message"]="success";
	//echo json_encode($result);
	//mysqli_close($con);
	
	echo "successfully Registered";
} 
else{
	/*$result["success"]="0";
	$result["message"]="error";
	echo json_encode($result);
	mysqli_close($con);
	*/
   echo "Not Registered";
	}
}
?>