<?php
/*if($_SERVER['REQUEST_METHOD']=='POST'){
$con=mysqli_connect("localhost","root","","finalyearproject");
if($con){
	echo"connected";
}
else{
	echo "not connected";
}
$uname=$_POST['uname'];
$password=$_POST['password'];
$sql="select `name`,`uname`,`password` form customer where uname='$uname' and password='$password'";
$result=mysqli_query($con,$sql);


//echo $sql;//mysqli_stmt_bind_param($sql,'ss',$uname,$password);
//mysqli_stmt_execute($sql);
//mysqli_stmt_store_result($sql);
//mysqli_stmt_bind_result($sql,$name,$uname,$password);
$response=array();

$response["success"]=false;
while(mysqli_fetch_array($result)){
	$response["success"]=true;
	$response["name"]=$name;
}
echo json_encode($response);
//}
*/
if($_SERVER['REQUEST_METHOD']=='POST'){

$uname=$_POST['uname'];
$password=$_POST['password'];
require_once("connect.php");
$sql="SELECT c_id FROM customer WHERE uname='$uname' and password='$password'";
$result=mysqli_query($con,$sql);
$check=mysqli_fetch_array($result);
//$res["c_id"]=$check[0];
if(isset($check)){
  
 //$check["c_id"] = $check[0];
   //echo "1";


	$check["success"]=true;

	$check["c_id"]=$check[0];
	//$check["uname"]=$check[1];
	//echo "success";
	echo json_encode($check);
}else
{
	$check["success"]=false;
	$check["c_id"] = "nill";
	
	echo json_encode($check);
	//$res["message"]="No";
//echo "failure";
}}




/*if($_SERVER['REQUEST_METHOD']=='POST')
{
$uname=$_POST['uname'];
$password=$_POST['password'];
require_once("connect.php");

 
$sql="SELECT c_id FROM customer WHERE uname='$uname' and password='$password'";

$result=mysqli_query($con,$sql);

$num = mysqli_num_rows($result);



if($num>0)

{
$row = mysqli_fetch_array($result);
  
 $res["c_id"] = $row[0];
   //echo "1";


	$res["success"]=1;

	//$res["message"]="Yes";
	
echo json_encode($res);
}

else{
	//echo "Somthing went wrong";

	$res["User_Id"] = "nill";
	
$res["success"]=0;
	
//$res["message"]="No";
	
	
echo json_encode($res);
}

 
 
mysqli_close($con);
 }
*/

?>