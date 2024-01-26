 <?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','finalyearproject');

$conn=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(mysqli_connect_errno()){
	die('not connect' .mysqli_connect_error()); 
}
else{
	//echo "connect";
}
if($_SERVER['REQUEST_METHOD']=='POST'){
$c_id=$_POST['c_id'];
$stmt=$conn->prepare("select sum(total) from acount where c_id='$c_id' ");
$stmt->execute();
$stmt->bind_result($total);
$product=array();
while($stmt->fetch()){
	$temp=array();
	$temp['total']=$total;
				
	  array_push($product,$temp);
	  
} }  
echo json_encode($product);
?>