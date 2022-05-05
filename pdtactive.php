<?php
include('dbcon.php');
$y=$_GET['bb'];
$sql="UPDATE `subcat` SET status=0 where sub_id='$y'";
mysqli_query($con,$sql);
header('location:addprd.php');
?>













  