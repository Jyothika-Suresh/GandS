<?php 
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];
$sql="select * FROM `reg` where `email` = '$vari';";
$data= mysqli_query($con,$sql);
if($res=mysqli_fetch_assoc($data))
{
$ker=$res['rid']	;
//echo $ker;
$prod=$_GET["pro"];
//echo $prod;
$qty=$_POST["quantity"];
    //echo $name;






$sql2="INSERT INTO `cart`( `rid`, `sub_id`, `quantity`) VALUES ('$ker','$prod','$qty')";
if(mysqli_query($con,$sql2))
{
echo "added to cart";
header("location:mycart.php");
}
  else
      {
		echo mysqli_errno($con);
      }
}


?>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script>