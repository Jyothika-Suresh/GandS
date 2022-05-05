<?php
include('dbcon.php');
$y=$_GET['bb'];
$sql="update register set status=0 where rid='$y'";
mysqli_query($con,$sql);
header('location:aregdtls.php');
?>













  