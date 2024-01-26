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

$stmt=$conn->prepare("select sum(amount)from pay_bill ");
$stmt->execute();
$stmt->bind_result($amount);
$product=array();
while($stmt->fetch()){
	$temp=array();
	$temp['amount']=$amount;
				
	  array_push($product,$temp);
	  
}   
echo json_encode($product);
?>