<?php
include ("dbase.php");
include ("head.php");
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
	$email=$_POST['email'];
	$uname=$_POST['uname'];
	$pass=$_POST['password'];
	$m_no=$_POST['M_no'];

	$in = mysql_query("INSERT INTO `customer`( `name`, `email`, `username`, `password`, `mobile_no`, `image`) VALUES ('$name','$email','$uname','$pass','$m_no','$fname')");
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
<body>
<head><link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css"></head>
<!--<div class="container">
<div class="page header">
<center><h1>Add menu</h1><center>
</div>
</div>-->
<center><div class="jumbotron">
<div class="page header">
<h1>Register Customer</h1>
</div>
</div><center>
</body>


<center><div class="row">

<div class="col-sm-6 col col-sm-offset-3">
<form onsubmit="return validateform()" action="" method="POST" enctype="multipart/form-data" >
<table class="table">

<tr><td>Name
<td><input type ="text" name="name" required></td>
</tr>
      <tr>
<td>Email</td>
<td><input type ="text" name="email" required></td>
</tr>
 <tr>
<td>Username</td>
<td><input type ="text" name="uname" required></td>
</tr>

<tr><td>Password
<td><input type ="password" name="password" required></td>
</tr>
<tr><td>Mobile No
<td><input type ="varchar" name="M_no" required></td>
</tr>
<tr><td>Image
<td><input type ="file" name="myfile" value="file" required></td>
</tr>  
      <tr>
<td>&nbsp;</td>
<td><input type ="submit" name="submit" value="Register" class="btn btn-success"></td>
</tr>
	 
</table>
</form></div>
</center>
</div>

<h4 align="center"><i>&copy;&nbsp cretaed by shehbaz ali</i><h4>
</html>
<?php include ("footer.php");?>
