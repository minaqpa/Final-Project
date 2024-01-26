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
<center>
<div class="panel-heading">
<table class="table table-bordered table table-hover" >
<div class="panel panel-primary">
<div class="info">
<td align="center"><b>Name</td>
<td align="center"><b> Image</td>

<td align="center"><b>Price </td>
<td align="center"><b>Category </td>
<td align="center"><b>Status </td>
<td><b>Action </td>
<td style="align:center";><b>Action </td>

</div>
<center>

</div>
</div>

</html>
<?php
$result= mysql_query("SELECT `m_id`, `name`, `img`, `price`, `category`,`status` FROM `menu");
while($data=mysql_fetch_array($result))
{ 

	?>
	<tr>
	<td text align="center"><?php	echo $data['name']; ?></td>
    <td align="center"><img src="upload/<?php echo $data["img"]?>" width="100" height="70"/></td>
	
	<td text align="center"><?php	echo $data['price']; ?></td>
    <td text align="center"><?php	echo $data['category']; ?></td>
	<td text align="center"><?php	echo $data['status']; ?></td>
	<td align="center"><a href="menuedit.php ?m_id=<?php echo $data['m_id']; ?>"><img src="images/edit.png" width="30" height="30" ></a></td>
	<!--<span class ="glyphicon glyphicon-edit"></span>-->
	<td align="center"><a href="javascript:delete_id(<?php echo $data['m_id']; ?>)">
		 <img src="images/delete.png" width="30" height="30" alt="Delete" /></a></td>
	</tr>

	<?php
 }
 
?>
</table>
<?php include("footer.php");?>