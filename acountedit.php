<?php
include"dbase.php";

/*mysql_connect('localhost','root','');
mysql_select_db('final_project');*/
 @$a_id = $_GET['a_id'];
 $v=mysql_query("select * from `acount` where a_id='$a_id'");
 $chk=mysql_fetch_array($v);
 if(isset($_POST['submit']))
{
	$date = $_POST['date'];
	$mid = $_POST['m_name'];
	$amnt = $_POST['price'];
     $qty = $_POST['qty'];
	  $ttt = $_POST['st'];
	
	 //$total=0;
	 
	//$Ttl= $_POST( number_format($_POST["quantity"] * $_POST["Amount"]));
	 
	$edit=mysql_query("UPDATE `acount` SET `m_id`='$mid',`date`='$date',`quantity`='$qty',`Amount`='$amnt',`total`='$ttt' WHERE a_id='$a_id'");
	if(!$edit)
	{
		echo "UPDATE Failed";
	}
	else
	{
		header('Location:' . $_SERVER['HTTP_REFERER']);

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
var email=document.getElementById("eml").value;
var validEmail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if (name=="")
{
alert("please Enter name");
return false;
}
 else if (email=="")
{
alert("Please Enter your email");
return false;

}
 else if(validEmail.test(email)==false)
{

alert("pleas enter valid email");
return false;
}
else if(image=="")
{
	alert("please select an image");
	return false;
}
else{
return true;
}
}
</script>
<script type="text/javascript">

function change_menu()
{
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","ajaxedit.php?menu="+document.getElementById("sn").value,false);
	xmlhttp.send(false);
	//alert(xmlhttp.responseText);
	document.getElementById("pr").value=xmlhttp.responseText;
	
	
     
	}
	//multiply price and quantity and get the total
	function total()
	{
		var price=document.getElementById("pr").value;
		var qty=document.getElementById("qt").value;
		var tot=price*qty;
		document.getElementById("sb").value=tot;
	}
</script>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

 <form action="" method="POST" onsubmit="return validate()" >
	<center><h2 style="color:gray; text align = center"> EDIT FORM </h2></center>
	  <center> <table class="table table-condensed">
            
            <tr> 
             <td>Date</td>
                <td><input type="date" name="date" id="eml" value="<?php echo $chk['date']?>"></td>
            </tr>
           
			 <tr>
  <label><td>Menu Item</label>
  <select name="m_name" id="sn"  align="right" onChange ="change_menu()">
  <option value="select" align="right">select</option>
<?php
  $tt = mysql_query("select * from Menu");
  while($st=mysql_fetch_array($tt))
  {
	  print '<option value="'.$st['m_id'].'">' .$st['name'].'</option>';
	  
	 // print<option value="$r['e_name']"></option>;
  }

  ?>
    </select>
	</td></label></tr>
	
			<tr>
			<td>Price</td>
                <td><input type="text" name="price" id="pr"  onkeyup="total()" value=""></td>
            </tr>
			<tr>
			<td>Quantity</td>
                <td><input type="text" name="qty" id="qt" onkeyup="total()" value="<?php echo $chk['quantity']?>"></td>
            </tr>
			<tr>
			<td>Total</td>
               <!-- <td><input type="text" name="ttl" id="sb" value="<?php// echo $chk['total']?>"></td>-->
				<td><input id="sb" type ="number" class="price" name="st" value=""  onkeyup="total()" required></td>
            </tr>
            <tr> 
			  <td><input type="submit" name="submit" value="submit"></td>
            </tr>
        </table></center>
    </form></body>
 </html>