<html>
<head>

	<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
</head>
<body>

<div class="container">
<div id="anim">
       <div class="jumbotron">

      <h2 align="center"> WELCOME TO ACOUNT DETAIL
	   </div>
 </div>
 <!-- Invoice section-->
 <tr class="success">
       <td align="right"><a href="invoice.php ?c_id=<?php echo $dd['c_id']; ?>">
 
       <!--  <button align ="left">Invoice</button></a>-->
	   <button type="button" class="btn btn-secondary">INVOICE</button></a>


       </td>
</tr>
<!-- Invoice section end-->
<!-- Bill payment section stat--> 

<tr class="success">
       <td align="right"><a href="pay_bill.php ?c_id=<?php echo $dd['c_id']; ?>">
 
       <!--  <button align ="left">Invoice</button></a>-->
	   <button type="button" class="btn btn-secondary">Amount Receive</button></a>


       </td>
</tr> 
<!-- Bill payment section End-->
 <div class="container">
<table class="table table-hover" >
<thead>
<div class="col-sm-8 col col-sm-offset-3">
<tr class="success">
<th><b>Date</th>
<th><b> Item</th>
<th><b>Quantity </th>
<th><b>Price</th>
<th><b>T Price</th>
<th><b>Action</th>
<th><b>Action</th>

</tr>

</thead>

<?php
     
	$result=mysql_query("SELECT * FROM `customer`");
		$dd=mysql_fetch_array($result);
     $sql=mysql_query("SELECT a.a_id,c.c_id,c.name,a.date,m.name,a.quantity,a.Amount,a.total from acount a join menu m on 
	 a.m_id=m.m_id join customer c on c.c_id=a.c_id  where c.c_id='$_GET[c_id]'");
while($data=mysql_fetch_array($sql)) 
{
?>

<?php
$total=0;
?>	
<tbody>

	<td text align="center"><?php	echo $data['date']; ?></td>
    <td text align="center"><?php	echo $data['name']; ?></td>
	 <td text align="center"><?php	echo $data['quantity']; ?></td>
	  <td text align="center"><?php	echo $data['Amount']; ?></td>
	  <td text align="center"><?php	echo $data['total']; ?></td>
	 <!--  <td text align="center">RS--><?php	//echo number_format($data["quantity"] * $data["Amount"],2); ?>
	  <td align="right"><a href="acountedit.php ?a_id=<?php echo $data['a_id']; ?>">
		<img src="images/edit.png" width="30" height="40" alt="edit"/> </a></td>
		 <td align="center"><a href="javascript:delete_id(<?php echo $data['a_id']; ?>)">
		 <img src="images/delete.png" width="30" height="40" alt="Delete" /></a></td>
	<!--<td><img src="upload/<?php// echo $data["fname"]?>" width="100" height="70"/></td>-->
	<?php
	
	//$totl=0;
//$total=$total+($data["quantity"] * $data["Amount"]);
//$totl+=$total;
	//$sql = "select sum(Amount) from acount";
//$q = mysql_query($sql);
//$row = mysql_fetch_array($q);

}
 
?>
<?php
$t=mysql_query("select sum(total) from acount where c_id='$_GET[c_id]'");
while($re=mysql_fetch_array($t)){
	
?>
<tr>
&nbsp
<td colspan="4" align="right"><label id="sum"></label>Grand Total</td>
<td align="center"  rowspan="3" ><?php	echo $re['sum(total)']; ?></td>
<?php
$st=$re['sum(total)'];

?>


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