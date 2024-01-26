<?php

$conn=mysqli_connect("localhost","root","","finalyearproject");
if($conn){
	echo"connect";
}
else{
	echo "not conn";
}
?> 