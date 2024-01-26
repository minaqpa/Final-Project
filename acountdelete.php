<?php
include"dbase.php";
if(isset($_GET['delete_id']))
{

 $del=$_GET['delete_id'];
$del=mysql_query("DELETE FROM `acount` WHERE a_id='$del'");
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

 ?> 
<input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />

