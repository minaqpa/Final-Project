<?php
include"dbase.php";

/*mysql_connect('localhost','root','');
mysql_select_db('final_project');*/
 @$c_id = $_GET['c_id'];
 $v=mysql_query("select * from `customer` where c_id='$c_id'");
 $chk=mysql_fetch_array($v);
 if(isset($_POST['submit']))
{
	$img = $_POST['img'];
	$name = $_POST['cname'];
	$email = $_POST['email'];
	$uname= $_POST['uname'];
	$cell = $_POST['cell'];
	
	$edit=mysql_query("UPDATE `customer` SET `name`='$name',`email`='$email',`uname`='$uname',`mobile`='$cell',`image`='$img' WHERE c_id='$c_id'");
	if(!$edit)
	{
		echo 'mysql_error';
	}
	else
	{
		header("location:allcustomer.php");
	}
}?>
<html>
<body>
<head>
<script type="text/javascript">
function validate()
{
var name=document.getElementById("nam").value;
var image=document.getElementById("img").value;
var price=document.getElementById("pr").value;
var category=document.getElementById("cat").value;

if (name=="")
{
alert("please Enter name");
return false;
}
 else if (image=="")
{
alert("Please select an image");
return false;

}
 else if(price=="")
{

alert("pleas enter price");
return false;
}
else if(category=="")
{
	alert("please select category");
	return false;
}
else{
return true;
}
}
</script>
<link rel="stylesheet" type="text/css" href="botstrap/bootstrap.min.css">

 <form action="" method="POST" onsubmit="return validate()" >
	<center><h2 style="color:gray; text align = center"> EDIT FORM </h2></center>
	  <center> <table class="table table-condensed">
            <tr> 
			 <tr> 
             <td>Image</td>
                <td><input type="file" name="img" id="img"  value="<?php echo $chk['image']?>"></td>
            </tr>
                <td>Customer Name</td>
                <td><input type="text" name="cname" id="nam" value="<?php echo $chk['name']?>"></td>
            </tr>
            <tr>
			 
			  <tr>
             <td>Email</td>
                <td><input type="text" name="email" id="pr" value="<?php echo $chk['email']?>"></td>
            </tr>
			 <tr> 
             <td>Username</td>
                <td><input type="text" name="uname" id="cat" value="<?php echo $chk['uname']?>"></td>
            </tr>
			 <tr> 
             <td>Cell No</td>
                <td><input type="text" name="cell" id="cell" value="<?php echo $chk['mobile']?>"></td>
            </tr>
            <tr> 
			  <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table></center>
    </form></body>
 </html>