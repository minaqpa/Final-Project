<?php
include("dbase.php");
include("head.php");
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>


<!--header end-->

<script type="text/javascript">
function delete_id(id)
{
     if(confirm('would you like to delete the record!!'))
     {
        window.location.href='menudelete.php?delete_id='+id;
     }
}
</script>
<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
</head>
<div class="jumbotron">
<center>
<h5>FOLLOWING ARE THE LIST OF ORDER THAT THE CUSTOMERS HAVE MADE</h5>
</div>
<center>
<table class="table table-bordered table table-hover" >
<div class="panel panel-primary">


<div class="panel-heading">

<!--<td align="center"><strong>DATE</td>-->
<div class="danger">
<td align="center"><strong> DATE  &nbsp TIME</td>
<td align="center"><strong> CUSTOMER NAME</td>

<td align="center"><strong>MENU ITEM</td>
<td align="center"><strong>QUANTITY </td>
</div>
</div>
</div>
<center>


</html>
<?php
$result= mysql_query("SELECT c.name as cname,m.name,o.quantity ,o.date from order_table o join menu m on 
	 o.m_id=m.m_id join customer c on c.c_id=o.c_id order by o.date DESC ");
while($data=mysql_fetch_array($result))
{ 

	?>
	<tr>
	<td text align="center"><?php	echo $data['date']; ?></td>
	<td text align="center"><?php	echo $data['cname']; ?></td>
   
	
	<td text align="center"><?php	echo $data['name']; ?></td>
    <td text align="center"><?php	echo $data['quantity']; ?></td>

	</tr>

	<?php
 }
 
?>
</table></div>
</div>

<?php include("footer.php");?>