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

$stmt=$conn->prepare("SELECT c.c_id,a.date,m.name,a.quantity,a.Amount,a.total from acount a join menu m on 
	 a.m_id=m.m_id join customer c on c.c_id=a.c_id where c.c_id=$c_id ORDER BY a.date DESC");
$stmt->execute();
$stmt->bind_result($c_id,$date, $name, $quantity, $Amount,$total);
$product=array();
while($stmt->fetch()){
	$temp=array();

	$temp['c_id']=$c_id;
	$temp['date']=$date;
	$temp['name']=$name;
	$temp['quantity']=$quantity;
	$temp['Amount']=$Amount;
	$temp['total']=$total;
				
	  array_push($product,$temp);
	  
}  }
echo json_encode($product);
?> 