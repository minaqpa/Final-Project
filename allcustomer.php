<?php
include("dbase.php");
include("head.php");
?>
<html>
<head>
<script type="text/javascript">
function delete_id(id)
{
     if(confirm('would you like to delete the record!!'))
     {
        window.location.href='deletecustomer.php?delete_id='+id;
     }

	
}
</script>
<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
</head>
<body>

<div class="container">
<div id="anim">
 <div class="jumbotron">
 <a href="home.php" class="btn btn-default btn-lg pull-right" role="botton" >
 HOME
 </a>
    <h2 align="center"> WELCOME TO CUSTOMER LIST DETAIL PAGE 
	 </div>
 </div>
 <div class="container">
<table class="table table-hover" >
<thead>
<div class="col-sm-8 col col-sm-offset-3">
<tr class="success" style="border:2px solid silver">
<!--<th><b>Image </th>-->
<th><b>Customer Name</th>
<th><b>Email</th>
<th><b>Username</th>
<th><b>Cell No </th>
<th><b>Action </th>
<th><b>Action </th>
<th><b>Action </th>
</tr>
</thead>
<?php

$sql=mysql_query("select `c_id`, `name`, `email`, `uname`, `mobile` FROM `customer`");

while($data=mysql_fetch_array($sql)) 
{
?>	
<tbody style="border:3px solid silver";>
	<tr>
	<!--<td><img src="upload/<?php //echo $data["image"]?>" width="170" height="120"/></td>-->
	<td text align="center"><?php	echo $data['name']; ?></td>
    <td text align="center"><?php	echo $data['email']; ?></td>
	<td text align="center"><?php	echo $data['uname']; ?></td>
	<td text align="center"><?php	echo $data['mobile']; ?></td>
	 <td><a href="add_acount.php ?c_id=<?php echo $data['c_id']; ?>">Details</a></td>
	 <td><a href="Customer_edit.php ?c_id=<?php echo $data['c_id']; ?>"><img src="images/edit.png" width="30" height="30" ></a></td>
	<!--<span class ="glyphicon glyphicon-edit"></span>-->
	<td align="center"><a href="javascript:delete_id(<?php echo $data['c_id']; ?>)">
		 <img src="images/delete.png" width="30" height="30" alt="Delete" /></a></td>

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



<!--  ------------ Pagination Start-------------------- -->

<!DOCTYPE html>
<html>
<head>
	<title>PHP Pagination Tutorial</title>
	<style type="text/css">
		.pagination{
			list-style: none;
		}
		.pagination li{
			float: left;
			margin: 5px;
		}
		.pagination li a{
			text-decoration: none;
		}
		.paragraph{
			width: 960px;
			height: auto;
			overflow: hidden;
			background: #eee;
			margin: 0 auto;
			font-size: 20px;
			font-family: arial;
		}
		.pages{
			font-size: 20px;
			margin: 0 auto;
			width: 500px;
			overflow: hidden;
			margin: 0 auto;

		}
	</style>
</head>
<body>

	<?php


$con = mysqli_connect("localhost","root","","finalyearproject");

function pagination($con,$table,$pno,$n){
	$query = $con->query("SELECT COUNT(*) as rows FROM ".$table);
	$row = mysqli_fetch_assoc($query);
	//$totalRecords = 100000;
	$pageno = $pno;
	$numberOfRecordsPerPage = $n;

	$last = ceil($row["rows"]/$numberOfRecordsPerPage);

	$pagination = "<ul class='pagination'>";

	if ($last != 1) {
		if ($pageno > 1) {
			$previous = "";
			$previous = $pageno - 1;
			$pagination .= "<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$previous."' style='color:#333;'> Previous </a></li>";
		}
		for($i=$pageno - 5;$i< $pageno ;$i++){
			if ($i > 0) {
				$pagination .= "<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$i."'> ".$i." </a></li>";
			}
			
		}
		$pagination .= "<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$pageno."' style='color:#333;'> $pageno </a></li>";
		for ($i=$pageno + 1; $i <= $last; $i++) { 
			$pagination .= "<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$i."'> ".$i." </a></li>";
			if ($i > $pageno + 4) {
				break;
			}
		}
		if ($last > $pageno) {
			$next = $pageno + 1;
			$pagination .= "<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$next."' style='color:#333;'> Next </a></li></ul>";
		}
	}
//LIMIT 0,10
	//LIMIT 20,10
	$limit = "LIMIT ".($pageno - 1) * $numberOfRecordsPerPage.",".$numberOfRecordsPerPage;

	return ["pagination"=>$pagination,"limit"=>$limit];
}

if (isset($_GET["pageno"])) {
	$pageno = $_GET["pageno"];

	$table = "customer";

	$array = pagination($con,$table,$pageno,10);

	$sql = "SELECT * FROM ".$table." ".$array["limit"];

	$query = $con->query($sql);

	while ($row = mysqli_fetch_assoc($query)) {
		echo "<div class='paragraph'><b>".$row["pid"]."</b> ".$row["p_description"]."</div>";
	}
	echo "<div class='pages'>".$array["pagination"]."</div>";

}else{
	$pageno = 1;

	$table = "customer";

	$array = pagination($con,$table,$pageno,10);

	$sql = "SELECT * FROM ".$table." ".$array["limit"];

	$query = $con->query($sql);

	while ($row = mysqli_fetch_assoc($query)) {
		echo "<div class='paragraph'><b>".$row["name"]."</b> ".$row["email"]."</div>";
	}
	echo "<div class='pages'>".$array["pagination"]."</div>";
}


?>

</body>
</html>





<!-- Pagination Start-->