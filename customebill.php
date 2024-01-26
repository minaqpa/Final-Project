
<?php
session_start();
include("dbase.php");
?>
<head>
<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
<script src="botstrap/jquery.min.js"></script>

</head>

<div class="container">
<table class="table table-hover" "table table-bordered">
<thead>
<div class="col-sm-8 col col-sm-offset-3">
<tr><td>Name: &nbsp <?php echo $_SESSION['uname'];?></td></tr>
<tr class="success">

<th><b>Date</th>
<th><b> Item</th>
<th><b>Quantity </th>
<th><b>Price</th>
<th><b>T Price</th>


</tr>

</thead>

<?php
  
	
$deductAmount=0;
     $sql=mysql_query("SELECT a.a_id,c.c_id,c.name,c.uname,a.date,m.name,a.quantity,a.Amount,a.total from acount a join menu m on 
	 a.m_id=m.m_id join customer c on c.c_id=a.c_id where c.c_id='$_SESSION[c_id]' ORDER BY a_id ");
 // Get the paid amount from pay_bill section
  //echo $sql;
	if($res=mysql_query("SELECT * FROM `pay_bill` where c_id='$_SESSION[c_id]'")){
		while($amount=mysql_fetch_assoc($res)){
		$deductAmount=$deductAmount+$amount['amount'];
	}
	}
	


while($data=mysql_fetch_array($sql)) 
{
?>

<?php
$total=0;
?>	
<tbody class="table table-bordered">
   
	<td text align="center"><?php	echo $data['date']; ?></td>
    <td text align="center"><?php	echo $data['name']; ?></td>
	 <td text align="center"><?php	echo $data['quantity']; ?></td>
	  <td text align="center"><?php	echo $data['Amount']; ?></td>
	  <td text align="center"><?php	echo $data['total']; ?></td>
	 <!--  <td text align="center">RS--><?php	//echo number_format($data["quantity"] * $data["Amount"],2); ?>

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
$t=mysql_query("select sum(total) from acount where c_id='$_SESSION[c_id]'");
while($re=mysql_fetch_array($t)){
	
?>
<tr>
&nbsp
<td colspan="4" align="right"><label id="sum"></label>Grand Total</td>
<td align="center"  rowspan="3" ><?php	echo $re['sum(total)']; ?></td>



</tr>


<?php
}
?>
<!-- received bill section--> 
<?php
$s=mysql_query("select sum(amount) from pay_bill where c_id='$_SESSION[c_id]'");
while($ree=mysql_fetch_array($s)){
	
?>

<tr style="text-align:right"  class="success">
&nbsp
<td colspan="4"><label id="sum"></label>Amount Received</td>
<td align="left" ><?php	echo $ree['sum(amount)'] ?></td>



</tr>

<?php
}
?>

<!--   END received bill-->

<!-- pay amount section-->

<?php
$t=mysql_query("select sum(total) from acount where c_id='$_SESSION[c_id]'");
while($re=mysql_fetch_array($t)){
	
?>
<center>
<tr colspan="6" class="success">
&nbsp
<td align="right" colspan="4"><label id="sum"></label>Payable Amount</td>
<td align="" ><?php	echo $re['sum(total)']-$deductAmount; ?></td>
<?php
//$st=$re['sum(total)'];

?>


</tr>

<?php
}
?>
   
   </center>
  <!-- pay amount section end--> 
   
</tbody>
</table>
</div>
</div>
</div>