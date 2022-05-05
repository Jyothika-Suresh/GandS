<?php
include 'dbcon.php';
$id=$_GET["del"];
//echo $id;
 $result=mysqli_query($con, "SELECT `cat_name` FROM `cat` WHERE `cat_id`='$id'");
 $row=mysqli_fetch_array($result);
	 //print_r($row);
mysqli_query($con,"DELETE FROM `cat` WHERE `cat_id`='$id'");
header("location:addcat.php");
?>