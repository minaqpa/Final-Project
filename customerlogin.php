<?php
include("dbase.php");
session_start();
//if(isset($_SESSION['username'])){
//header('location:home.php');	
//}
if(isset($_POST['login']))
//if($_POST)
{   
    //$c_id=$_POST['c_id'];
	$uname=$_POST['uname'];
	$password=$_POST['password'];
$re=mysql_query("SELECT * FROM `customer` WHERE  uname ='$uname' and password='$password'");
$s=mysql_num_rows($re);

//echo "$s";
//$cont=mysql_num_rows($re);
//if($cont==true)
if($s>0)
{ 
$ree=mysql_fetch_assoc($re);
	$_SESSION['c_id']=$ree['c_id'];
	$_SESSION['uname']=$ree['uname'];
	$_SESSION['password']=$ree['password'];
 header("location:customebill.php");
}
else
{
	echo "acount not valid";
}	
}
?>

<html>
<head>
<body>
<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">
<center>
<div class="jumbotron">
<marquee>WELCOME TO LOGIN SECTION</marquee>
</div>
<center><tr style="padding-left:200px";>
<td style="padding-left:200px";><img src="images/login.png" width="100" height="130"> </td></tr></center>
<div class="row">
<div class="col-sm-6 col col-sm-offset-3">
<form method="POST" >
<table class="table">

<tr><td>USERNAME</td>
<td><input type ="text" name="uname" required></td>
</tr>
      <tr>
<td>PASSWORD</td>
<td><input type ="password" name="password" required></td>
</tr> 
      <tr>
<td>&nbsp;</td>
<td><input type ="submit" name="login" value="login " class="btn btn-success"></td>
</tr>
	 
</table>
</form></div>
</center>
</div>
</div></div>
</body>
<html>
<?php include("footer.php");?>