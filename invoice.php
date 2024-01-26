<?php
include("dbase.php");


?>

<html>
<head>
<script src="botstrap/jquery.min.js"></script>
  <script src="botstrap/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
</head>
<body>

<div class="container">
<div id="anim">
 <div class="jumbotron">

    <h2 align="center"> INVOICE DETAIL
	 </div>
 </div>
 <div class="col-sm-2">
 
 <thead class="success">
 <th class ="text-success"><strong> Customer NAME:</th>
 </thead>
</div>
 <?php //echo $_SESSION['username'];
	if(isset($_GET['c_id'])){
		$id=$_GET['c_id'];

		$result=mysql_query("SELECT * FROM `customer` WHERE c_id='$id'");
		$data=mysql_fetch_assoc($result);
		 echo $data['name'];
		
	}
 
?> 
 
 <div class="container">
<table class="table table-responsive">
<thead>
<tr class="bg-success">
<th  align="center"><b align="center">Date</th>
<th align="center"><b> Item</th>
<th align="center"><b>Quantity </th>
<th align="center"><b>Price</th>
<th align="center"><b>T Price</th>




</thead>

<?php
     
	

     $sql=mysql_query("SELECT a.a_id,c.c_id,c.name,a.date,m.name,a.quantity,a.Amount,a.total from acount a join menu m on 
	 a.m_id=m.m_id join customer c on c.c_id=a.c_id  where c.c_id='$_GET[c_id]'");
 



while($data=mysql_fetch_array($sql)) 
{
?>

<?php
$total=0;
?>	
<tbody>
     
	<td><?php	echo $data['date']; ?></td>
    <td><?php	echo $data['name']; ?></td>
	 <td><?php	echo $data['quantity']; ?></td>
	  <td><?php	echo $data['Amount']; ?></td>
	  <td><?php	echo $data['total']; ?></td>
	 
	<?php
	
}
 
?>
<?php
$t=mysql_query("select sum(total) from acount where c_id='$_GET[c_id]'");
while($re=mysql_fetch_array($t)){
	
?>
<tr>
&nbsp
<td colspan="4" align="left" ><label id="sum"></label>Grand Total</td>
<td><?php	echo $re['sum(total)']; ?></td>

</tr>

<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</body></html>