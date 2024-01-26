<?php
include("header.php");
include("dbase.php");
if(isset($_POST['submit'])){
	$c_name=$_GET['c_id'];
	$dat=$_POST['date'];
	$amnt=$_POST['amount'];
	$insert=mysql_query("INSERT INTO `pay_bill`(`c_id`, `amount`, `date`) VALUES ('$c_name','$amnt','$dat')");
	if($insert){
		echo "inserted";
		//echo"<script type='text/javascript'>alert('inserted');</script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else{
		echo  "Inserted failed";
	}
}
?>
<html>
<head>

		<script src="js/jquery2.js"></script>

		<script src="main.js"></script>
<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
<script type="text/javascript" src="botstrap/bootstrap.min.js"></script>
<head>
<script type="text/javascript">

</script>
</head>
<body>

<center>
   <div class="row" >
   <div class="col-sm-6 col col-sm-offset-3" >
   <form method="POST" action="" onsubmit="return validateform()">
    <table class="table">
 				<div class="panel panel-primary">
   <div class="panel-heading">
   
customer Name:
<?php //echo $_SESSION['username'];
	if(isset($_GET['c_id'])){
		$id=$_GET['c_id'];
     
		$result=mysql_query("SELECT * FROM `customer` WHERE c_id='$id'");
		$data=mysql_fetch_assoc($result);
		 //echo'<div class="panel-heading">';
		// echo '<td>'.$data['name'].'</td>';
		 echo $data['name'];
	      //echo $data['c_id '];	
		 // echo'</div>';
	}
 
?></div>
<tr>
	  <td>Date</td>
<td><input type ="date" name="date" required></td>
</tr>
<tr>
	  <td>Amount</td>
<td><input type ="Number" name="amount" required></td>
</tr>
 <tr>
<td>&nbsp;</td>
<td><input type ="submit" name="submit" value="ADD" class="btn btn-primary btn-lg""></td>
</tr>
	 
</table></form>
</div>
</div>
</div>

 <div class="col-sm-6 col col-sm-offset-3">
<table class="table table-hover" >
<thead class="success">
<th class="success">Date</th>
<th class="success">Amount</th>

</thead>
<?php
$rec=mysql_query("SELECT * FROM `pay_bill` WHERE c_id='$_GET[c_id]'");
while($t=mysql_fetch_assoc($rec))
{?>

<tbody>
<td><?php echo $t['date'];?></td>
<td><?php echo $t['amount'];?></td>


</tbody>

	<?php
}
?>


<?php
$t=mysql_query("select sum(amount) from pay_bill where c_id='$_GET[c_id]'");
while($re=mysql_fetch_array($t)){
	
?>
<tr class="info">
&nbsp
<td colspan="" align=""><label id="sum"></label>Total Received</td>
<td align=""  rowspan="3" ><?php	echo $re['sum(amount)']; ?></td>
<?php
$st=$re['sum(amount)'];

?>


</tr>


<?php
}
?>


</table>
</div>
</center></body>

</html>