<?php
include('dbcon.php');
$y=$_GET['aa'];
$sql="update `subcat` SET status=1 where sub_id='$y'";
mysqli_query($con,$sql);
header('location:addprd.php');
?>
