<?php
include"dbase.php";
if(isset($_GET['delete_id']))
{

 $del=$_GET['delete_id'];
$del=mysql_query("DELETE FROM `customer` WHERE c_id='$del'");
}
if(!$del)
{
	echo "not deleted";
header("Location:allcustomer.php");
	//header('refresh:1; url=allcustomer.php');
	//	echo'<script type="javascript">';
      //echo'		window.alert("not delete")';
		//echo'</script>';
}

else{

  //echo '<script language="javascript">';
  //echo 'alert( delete)';  //not showing an alert box.
  //echo '</script>';
  //exit;
echo "delete successfully";
header("location:allcustomer.php");
}
?> 
