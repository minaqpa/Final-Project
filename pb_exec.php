
<?php
include("dbase.php");
if(isset($_POST['submit'])){
	$c_name=$_GET['c_id'];
	$dat=$_POST['date'];
	$amnt=$_POST['amount'];
	$insert=mysql_query("INSERT INTO `pay_bill`(`c_id`, `amount`, `date`) VALUES ('$c_name','$amnt','$dat')");
	if($insert){
		
		echo"<script type='text/javascript'>alert('inserted');</script>";
		header("Location:pay_bill.php");
	}
	else{
		echo"Inserted failed";
	}
	
}
?>