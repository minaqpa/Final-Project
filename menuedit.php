<?php
include"dbase.php";

/*mysql_connect('localhost','root','');
mysql_select_db('final_project');*/
 @$m_id = $_GET['m_id'];
 $v=mysql_query("select * from `menu` where m_id='$m_id'");
 $chk=mysql_fetch_array($v);
 if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$img = $_POST['img'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$stat = $_POST['status'];
	$edit=mysql_query("UPDATE `menu` SET `name`='$name',`img`='$img',`price`='$price',`category`='$category',`status`='$stat' WHERE m_id='$m_id'");
	if(!$edit)
	{
		echo mysql_error;
	}
	else
	{
		header("location:menudetail.php");
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
                <td>Menu Name</td>
                <td><input type="text" name="name" id="nam" value="<?php echo $chk['name']?>"></td>
            </tr>
            <tr>
			  <tr> 
             <td>image</td>
                <td><input type="file" name="img" id="img"  value="<?php echo $chk['img']?>"></td>
            </tr>
			  <tr>
             <td>Price</td>
                <td><input type="text" name="price" id="pr" value="<?php echo $chk['price']?>"></td>
            </tr>
			 <tr><td>Category</td>
            <td>
         <select  name ="category">
        <option>Select</option>
      <option value="Meal"
	  <?php
if($chk["category"]=='Meal')
{
   echo "selected";
}

?>
	  >Meal</option>
	<option value="Fast Food"
	    <?php
if($chk["category"]=='Fast Food')
{
   echo "selected";
}

?>
	 >Fast Food</option>
       <option value="Cold Drink"
	   
	     <?php
if($chk["category"]=='Cold Drink')
{
   echo "selected";
}

?>
	   >Cold Drink</option>

     </select></td>
    </tr>
<tr>
<td>Status</td>
<td>
<select  name ="status">
<option>Select</option>
<option value="Available"
<?php
if($chk["status"]=='Available')
{
   echo "selected";
}

?>

>Available</option>
<option value="Not Available"

<?php
if($chk["status"]=='Not Available')
{
   echo "selected";	
}

?>

>Not Available</option>

</select></td>
</tr>

             <!--<td>Category</td>
                <td><input type="text" name="category" id="cat" value="<?php// echo $chk['category']?>"></td>
            </tr>-->
            <tr> 
			  <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table></center>
    </form></body>
 </html>