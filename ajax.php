<?php
$link=mysqli_connect("localhost","root","");
$k=mysqli_select_db($link,"finalyearproject");
if(!$k){
	echo "not connecgted";
}
else{
	// echo "connected";
}
$menu = ''; 
if( isset( $_GET['menu'])) {
    $menu = $_GET['menu']; 
}


//$country=$_GET["country"];
if($menu!=""){
$res=mysqli_query($link,"select *from menu where m_id=$menu");

//echo "<select>";
while($row=mysqli_fetch_array($res))
{
	
 echo $row["price"];
	
}
//echo "</select>";
}
?>
 