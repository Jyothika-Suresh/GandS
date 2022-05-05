<?php
include 'dbcon.php';
$id=$_GET["del"];
//echo $id;
 $result=mysqli_query($con, "SELECT `prd_name` FROM `prdttype` WHERE `prd_id`='$id'");
 $row=mysqli_fetch_array($result);
	 //print_r($row);
mysqli_query($con,"DELETE FROM `prdttype` WHERE `prd_id`='$id'");
header("location:addmcat.php");
?>