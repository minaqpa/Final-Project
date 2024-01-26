<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','finalyearproject');
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
if($con){
	//echo "connect";
}
else{
	//echo "not conect";
}
?>