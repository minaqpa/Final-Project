<?php

include ("dbase.php");
session_start();
if(isset($_POST['submit'])){
	$cname=@$_GET['c_id'];
	$dat=$_POST['date'];
	$menu=$_POST['m_name'];
	$qt=$_POST['qty'];
	$price=$_POST['pricee'];
	$subt=$_POST['st'];


	$in = mysql_query("INSERT INTO `acount`( `c_id`, `m_id`, `date`, `quantity`,`Amount`,`total`) VALUES ('$cname','$menu','$dat','$qt','$price','$subt')");
	if(!$in)
	{
		echo"not insert";
	}
	else
	{
		echo '<script language="javascript">';
echo 'alert("Inserted succcessfully")';
echo '</script>';
	unset($_POST['submit']); 
	header("Location:add_acount.php");
   
    exit;
	//echo"inserted";	
	}
}

?>