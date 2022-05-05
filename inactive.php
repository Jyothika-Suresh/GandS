<?php
include('dbcon.php');
$y=$_GET['aa'];
$sql="update register set status=1 where rid='$y'";
mysqli_query($con,$sql);
header('location:aregdtls.php');
?>
