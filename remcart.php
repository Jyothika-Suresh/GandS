<?php
include 'dbcon.php';
session_start();
$vari=$_SESSION['email'];
$id=$_GET["as"];
echo "$id";
$sq="select * from reg where email='$vari'";
$data=(mysqli_query($con,$sq));
if($row=mysqli_fetch_assoc($data))
{
$regid=$row['rid'];
$result=mysqli_query($con,"DELETE FROM `cart` WHERE `sub_id`='$id' AND `rid`='$regid'");
$row=mysqli_fetch_array($result);
header("location:mycart.php");
}
?>