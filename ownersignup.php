<?php
include ("dbase.php");
if(isset($_POST['submit'])){
$fname = $_FILES['myfile']['name'];
	$f_tmp = $_FILES['myfile']['tmp_name'];
	$store = "upload/";
	if(move_uploaded_file($f_tmp,$store."/".$fname))
	
	{
		//echo "upload";
	}
	else
	{
		echo"upload failed";
	}
	$username=$_POST['username'];
	$email=$_POST['email'];
	$uname=$_POST['uname'];
	$pass=$_POST['password'];
	$mob=$_POST['mobile'];
	$a=mysql_query("Select *from owner");
	$e=mysql_num_rows($a);
	if($e!=0){
		echo '<script>alert("User Already exist")</script>';
	}
else{
	$in = mysql_query("INSERT INTO `owner`(  `name`, `email`, `user_name`, `password`,`mobile`,`img`) VALUES ('$username','$email','$uname','$pass','$mob','$fname')");
	if(!$in)
	{
		echo '<script>alert("Resistration Failed")</script>';
	}
	else
	{
	echo '<script>alert("Registration succesfull")</script>';
	}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
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
				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-49">
						<strong>SIGN-UP
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100"><b>Name</span>
						<input class="input100" type="text" name="username" placeholder="Type your username">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Email</span>
						<input class="input100" type="text" name="email" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf1fb;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Usernmae</span>
						<input class="input100" type="text" name="uname" placeholder="Type your username">
						<span class="focus-input100" data-symbol="	&#xf235;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Password</span>
						<input class="input100" type="password" name="password" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Mobile No</span>
						<input class="input100" type="number" name="mobile" placeholder="Type your Mobile no">
						<span class="focus-input100" data-symbol="&#xf2be;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100"><b>Image</span>
						<input class="input100" type="file" name="myfile" value="file" placeholder="">
						<span class="focus-input100" data-symbol="&#xf27e;"></span>
					</div>
					
					
					<!--<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>-->
					
					<div class="container-login100-form-btn" id="log">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
							SIGN-UP
							</button>
						</div>
					</div>

					<div class="txt1 text-center p-t-54 p-b-20">
						
				

						<a href="ownerlogin.php" class="txt2">
							<b><u>LOGIN NOW
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