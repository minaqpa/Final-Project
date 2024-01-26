<?php

include ("dbase.php");
session_start();

/*if(!isset($_SESSION['username']))
{
	header('location:login.php');
	
}*/
	
if(isset($_POST['submit'])){
	$cname=$_GET['c_id'];
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
		
	echo"inserted";	
	}
}

?>

<html>
<head><link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css"></head>
<script src="botstrap/jquery.min.js"></script>
<style>
body {
 background-color:"silver";

}
</style>

<body>
<!--<div class="container">
<div class="page header">
<center><h1>Add menu</h1><center>
</div>
</div>-->
<center><div class="jumbotron">
<div class="page header">
<a href="home.php"><button>HOME</button></a>
<h1>Add Acount</h1>
</div>
</div><center>



<center><div class="row">

<div class="col-sm-6 col col-sm-offset-3">
<form onsubmit="return validateform()" action="" method="POST" enctype="multipart/form-data" >
<table class="table">
<tr>
customer Name:
<?php //echo $_SESSION['username'];
	if(isset($_GET['c_id'])){
		$id=$_GET['c_id'];

		$result=mysql_query("SELECT * FROM `customer` WHERE c_id='$id'");
		$data=mysql_fetch_assoc($result);
		 echo $data['name'];
		
	}
 
?></tr>


	  <br><br>
<tr>
	  <td>Date</td>
<td><input type ="date" name="date" required></td>
</tr>
<tr>
  <label><td>Menu Item</label>
  <select name="m_name" id="sn"  align="right" onChange ="change_menu()">
  <option value="select" align="right">select</option>
<?php
  $tt = mysql_query("select * from Menu");
  while($st=mysql_fetch_array($tt))
  {
	  print '<option value="'.$st['m_id'].'">' .$st['name'].'</option>';
	  
	 // print<option value="$r['e_name']"></option>;
  }

  ?>
    </select>
	</td></label></tr>
	<tr>
<td>Quantity</td>
<td><input type ="number" name="qty" onkeyup="total()" id="qt" required></td>
</tr>

<tr>
<td>price</td>
<td><input  type ="text" name="pricee"  id="pr"  onkeyup="total()"/></td>


</tr>
<tr>
<td>Subtotal</td>
<td><input id="sb" type ="number" class="price" name="st" value=""  onkeyup="total()" required></td>


</tr>




 
      <tr>
<td>&nbsp;</td>
<td><input type ="submit" name="submit" value="Add To Acount" class="btn btn-success"></td>
</tr>
	 
</table>
</form></div>
</center>
</div>

<!--   Add section End
-->


<!--   
show SECTION

-->




<div class="container">
<div id="anim">
       <div class="jumbotron">

      <h2 align="center"> WELCOME TO ACOUNT DETAIL
	   </div>
 </div>
 <!-- Invoice section-->
 <tr class="success">
       <td align="right"><a href="invoice.php ?c_id=<?php echo $data['c_id']; ?>">
 
       <!--  <button align ="left">Invoice</button></a>-->
	   <button type="button" class="btn btn-secondary">INVOICE</button></a>


       </td>
</tr>
<!-- Invoice section end-->
<!-- Bill payment section stat--> 

<tr class="success">
       <td align="right"><a href="pay_bill.php ?c_id=<?php echo $data['c_id']; ?>">
 
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
     
	
$deductAmount=0;
     $sql=mysql_query("SELECT a.a_id,c.c_id,c.name,a.date,m.name,a.quantity,a.Amount,a.total from acount a join menu m on 
	 a.m_id=m.m_id join customer c on c.c_id=a.c_id  where c.c_id='$_GET[c_id]' ORDER BY a_id ");
 // Get the paid amount from pay_bill section
  
	if($res=mysql_query("SELECT * FROM `pay_bill` WHERE c_id='$_GET[c_id]'")){
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
<!-- received bill section--> 
<?php
$s=mysql_query("select sum(amount) from pay_bill where c_id='$_GET[c_id]'");
while($ree=mysql_fetch_array($s)){
	
?>

<tr style="text-align:right"  class="success">
&nbsp
<td colspan="4"><label id="sum"></label>Amount Received</td>
<td align="left" ><?php	echo $ree['sum(amount)'] ?></td>
<?php
$st=$re['sum(total)'];

?>


</tr>

<?php
}
?>

<!--   END received bill-->

<!-- pay amount section-->

<?php
$t=mysql_query("select sum(total) from acount where c_id='$_GET[c_id]'");
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
<!--  Auto fetch the price based on menu selection -->
<script type="text/javascript">

function change_menu()
{
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","ajax.php?menu="+document.getElementById("sn").value,false);
	xmlhttp.send(false);
	//alert(xmlhttp.responseText);
	document.getElementById("pr").value=xmlhttp.responseText;
	
	
     
	}
	//multiply price and quantity and get the total
	function total()
	{
		var price=document.getElementById("pr").value;
		var qty=document.getElementById("qt").value;
		var tot=price*qty;
		document.getElementById("sb").value=tot;
	}
</script>
<script type="text/javascript">
function delete_id(id)
{
     if(confirm('would you like to delete the record!!'))
     {
        window.location.href='acountdelete.php?delete_id='+id;
     }

	
}
</script>
</body></html>