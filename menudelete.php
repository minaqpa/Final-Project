<?php
include"dbase.php";
if(isset($_GET['delete_id']))
{

 $del=$_GET['delete_id'];
$del=mysql_query("DELETE FROM `mene` WHERE m_id='$del'");
}
header("location:menudetail.php")
?> 
