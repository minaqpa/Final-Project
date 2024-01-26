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


$stmt=$conn->prepare("SELECT `m_id`,`name`,`img`,`price`,`status` FROM `menu`");
$stmt->execute();
$stmt->bind_result($m_id,$name, $img, $price, $status);
$product=array();
while($stmt->fetch()){
	$temp=array();
	$temp['m_id']=$m_id;
	$temp['name']=$name;
	$temp['img']=$img;
	$temp['price']=$price;
	$temp['status']=$status;
				
	  array_push($product,$temp);
	  
}   
echo json_encode($product);
?> 