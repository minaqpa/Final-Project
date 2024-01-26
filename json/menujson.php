<?php
include("dbase.php");

// Create connection
$conn = new mysqli("localhost","root","","finalyearproject");

if ($conn->connect_error) {
 
 die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT name,img,price,status FROM `menu`  ";

$result = $conn->query($sql);

if ($result->num_rows >0) {
 
 
 while($row[] = $result->fetch_assoc()) {
 
 $tem = $row;
 
 $json = json_encode($tem);
 
 
 }
 
} else {
 echo "No Results Found.";
}
 echo $json;
$conn->close();
?>