
<?php
include("dbase.php");

if(isset($_SESSION['username'])){
header('location:home.php');	
}
if(isset($_POST['login']))
//if($_POST)
{
	$username=$_POST['username'];
	$password=$_POST['password'];
$re=mysql_query("SELECT `username`, `password` FROM `acnt` WHERE  username ='$username' and password='$password'");
$s=mysql_num_rows($re);

//echo "$s";
//$cont=mysql_num_rows($re);
//if($cont==true)
if($s>0)
{
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
header('location:home.php');
}
else
{
	echo '<script>alert("acount not valid")</script>';
}	
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>OWNER LOGIN PAGE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="ref/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="ref/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="ref/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="ref/css/util.css">
	<link rel="stylesheet" type="text/css" href="ref/css/main.css">
<!--===============================================================================================-->

<style>
#log{
	padding-top:20px;
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('ref/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-49">
						<strong>Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100"><b>Username</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<!--<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>-->
					
					<div class="container-login100-form-btn" id="log">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						
				

						<a href="ownersignup.php" class="txt2">
							<b><u>Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="ref/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="ref/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="ref/vendor/bootstrap/js/popper.js"></script>
	<script src="ref/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="ref/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="ref/vendor/daterangepicker/moment.min.js"></script>
	<script src="ref/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="ref/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="ref/js/main.js"></script>

</body>
</html>