<?php
include ("dbase.php");
//include ("head.php");
if(isset($_POST['submit'])){
$fname = $_FILES['myfile']['name'];
	$f_tmp = $_FILES['myfile']['tmp_name'];
	$store = "upload/";
	if(move_uploaded_file($f_tmp,$store."/".$fname))
	
	{
		echo "upload";
	}
	else
	{
		echo"upload failed";
	}
	$name=$_POST['name'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$stat=$_POST['status'];
	
	$in = mysql_query("INSERT INTO `menu`(   `name`, `img`, `price`, `category`,`status`) VALUES ('$name','$fname','$price','$category','$stat')");
	if(!$in)
	{
		echo"not insert";
	}
	else
	{
	header('location:menudetail.php');	
	}
}
?>

<html>
<head><link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css"></head>
<body>
<!--<div class="container">
<div class="page header">
<center><h1>Add menu</h1><center>
</div>
</div>-->
<center><div class="jumbotron">
<div class="page header">
<h1>Add Menu</h1>
</div>
</div><center>
</body>


<center><div class="row">

<div class="col-sm-6 col col-sm-offset-3">
<form onsubmit="return validateform()" action="" method="POST" enctype="multipart/form-data" >
<table class="table">

<tr><td>Product Name
<td><input type ="text" name="name" required></td>
</tr>
      <tr>
<td>Image</td>
<td><input type ="file" name="myfile" value="file" required></td>
</tr>
 <tr>
<td>Price</td>
<td><input type ="text" name="price" required></td>
</tr>
<tr><td>Category</td>
<td>
<select  name ="category">
<option>Select</option>
<option value="Meal">Meal</option>
<option value="Fast Food">Fast Food</option>
<option value="Cold Drink">Cold Drink</option>

</select></td>
</tr>
<tr>
<td>Status</td>
<td>
<select  name ="status">
<option>Select</option>
<option value="Available">Available</option>
<option value="Not Available">Not Available</option>

</select></td>
</tr>
<!--<tr><td>Category</td>
<td><input type ="text" name="category" required></td>
</tr>-->
  
      <tr>
<td>&nbsp;</td>
<td><input type ="submit" name="submit" value="Add" class="btn btn-success"></td>
</tr>
	 
</table>
</form></div>
</center>
</div>
</html>
<?php

//include("footer.php");

?>