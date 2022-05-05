<?php
include 'dbcon.php';
$id=$_GET["del"];
//echo $id;
 $result=mysqli_query($con, "SELECT `sub_name` FROM `subcat` WHERE `sub_id`='$id'");
 $row=mysqli_fetch_array($result);
	 //print_r($row);
mysqli_query($con,"DELETE FROM `subcat` WHERE `sub_id`='$id'");
header("location:addprd.php");
?>