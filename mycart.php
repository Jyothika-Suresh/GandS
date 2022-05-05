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

//echo "added to cart";
}
  else
      {
		echo mysqli_errno($con);
      }


//$id=$_GET['id'];
//echo $id;

	//$total=$_POST["total"];
    //echo $name;


?>
<html>
<head>
	<title>G&S Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/style1.css">
	<style>
		.logo-image img{
		width: 200;
		height: 200px;
		border-radius: 50%;
		overflow: hidden;
		margin-top: -150px;
		margin-left:-10px;
		float:left;
		}
		h4{
			  text-align: justify;
		  text-justify: inter-word;
			
		}
		
<!--cart-->
.form {border: 3px solid green; 
   width:50%;align:center;
   float:center;}
    .span{
   display:block;
   margin-left:20px;
   color:red;
   font-style:italics;
   } 
   div.prod{
  margin: 5px;
  border: 1px solid white;
  float: left;
  width:99%;
  height:100%;
  border: 3px solid #777;
}

div.prod:hover {
  border: 3px solid green;
}


.prod1 {
  padding: 0px 20px ;
  float:left;
  width:20%;
  height:22%;
  background-color:white;
  margin-left: auto;
  margin-right: auto;
  color:#003300;
  font-size:20px;
}
.prod2 {
  padding: 25px 20px ;
  float:left;
  width:50%;
  height:22%;
  background-color:white;
  margin-left: auto;
  margin-right: auto;
  color:#003300;
  font-size:20px;
} 
.prod3 {
  padding: 25px 20px ;
  float:left;
  width:30%;
  height:22%;
  background-color:white;
  margin-left: auto;
  margin-right: auto;
  color:#003300;
  font-size:20px;
} 

div.desc {
  padding: 1px;
  text-align: center;
  color:black;
  font-size:20px;
}  
div.desc1 {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:25px;
} 
div.desc2 {
  padding: 5px;
  text-align: center;
  color:black;
  font-size:10px;
} 
input[type=button] {
   border: none;
  outline: 0;
  display: inline-block;
  padding: 12px 20px;
  text-align: center;
  cursor: pointer;
  font-size:22px;
  height:8%;
  
  background-color: #0e6235;
  color: white;
  border-radius: 4px;

}

input[type=button]:hover {
  background-color: #2a965c;
  color: white;
}
input[type=submit] {
   border: none;
  outline: 0;
  display: inline-block;
  color: white;
  background-color:#0e6235;
  text-align: center;
  cursor: pointer;
  font-size:30px;
  height:10%;
  width:10%;
}

input[type=submit]:hover {
  background-color: #555;
  color: white;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width:100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  width:5%;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}		

	</style>
</head>
<body>

<div class="header">
  <h1>G&S ELECTRICALS</h1>
  
  <h>Water pump A boon for farmers</h><br>
  <div class="logo-image">
            <a href="home.php"><img src="image/logo2.png" class="img-fluid"/></a>
      </div>
  <p style="margin-left: 0px;"></p>
</div>

<center><p>Welcome <?php echo $vari; ?></p></center>
<br>
<div class="navbar">
<a href="home.php" class="active">Home</a>
<?php
$sql="SELECT * from prdttype";
$data=mysqli_query($con,$sql);
	while($ress=mysqli_fetch_array($data))
		{?>
		  <a href="catview.php?am=<?php echo $ress['prd_id'];?>"><?php echo $ress['prd_name'];?></a>
		  <?php
		}
?>
<a href="contact.php" class="right">Contact</a>
  <a href="login.php" class="right">Login</a>
  <a href="profile.php" class="right">Profile</a>
  <a href="shome.php" class="right">Service</a>
</div>
<!--cart starts-->
<br>
<br>

	<?php
	//total
	if(isset($_POST['submit'])){
		$total=$_POST["total"];
		echo $total;
	}
	//ends
	?>

<form  method="post" >
 
<table id="customers">

	<?php

$query="SELECT * from cart where rid ='$ker'"; 
$data = mysqli_query($con,$query);
while($ros=mysqli_fetch_assoc($data))
{
	$produ=$ros['sub_id'];
	
	$query3="SELECT * from subcat where sub_id ='$produ'"; 
$data3 = mysqli_query($con,$query3);
while($res=mysqli_fetch_assoc($data3))
{
	
	?>

 <tr>
 <td> 
<center>
  <img src="image/<?php echo $res['sub_img']; ?>"  width="170px" height="175px">
  </center>
  <td>
 <b><div class="desc" ><?php echo $res['sub_name'];?></div></b>

 </td>
 <td>
 <div class="desc1" id="data-price"> Price :  &nbsp;	₹<?php echo $res['sub_price'];?>
 
 </div>  
 </td>
  
   <td>
  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<a href="remcart.php?as=<?php echo $res["sub_id"];?>"><input type="button" value="Remove">
  </td>
  

 </tr> 
 

 
 <tr>
	 <td>
	 </td>
	 <td>
	 </td>
 <td>
	 </td>
	 <td>
	 <h4>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <a href="checkout.php?as=<?php echo $res["sub_id"];?>">
   <button type="Button" name="submit" value="Buy Now" style='background-color:#19913e;' hidden></a></h4>
	 </td>
 </tr>
 <?php
 $total = 0;
	$total += $res["sub_price"] ;
}
}?>

</table>
<br>
<!--<input type="text" name="total" value="<?php //echo $total?>"></input>-->
<p name="total">total:<?php echo $total?></p>
<center><a href="checkout.php"> <input type="Button" name="submit" value="Buy Now" style='background-color:#19913e;'></a></center>
<center>
<?php

$query="SELECT * from cart where rid ='$ker'"; 
$data = mysqli_query($con,$query);
if($ros=mysqli_fetch_assoc($data))
{
?>

	<?php
}
?>
</div>
</form>


<!--cart ends-->

<!--footer-->
<div class="footer">
  <div class="row">
  <div class="column" style="background-color:#032a23;;">
    <h2>Quick Links</h2>
    <p><a style="text-decoration:none" href="home.php"><font face="Bookman Old Style"  color="white" font size="3"> Home</font></a></p>
    <p><a style="text-decoration:none" href="cat.php"><font face="Bookman Old Style"  color="white" font size="3">Shop</font></a></p>
    <p><a style="text-decoration:none" href="login.php"><font face="Bookman Old Style"  color="white" font size="3">Login</font></a></p>
  </div>
  <div class="column" style="background-color:#032a23;">
    <h2>Contact info</h2>
    <address> G & S ENCLAVE LIC JUNCTION,<br> Kattappana,<br> Kerala 685508</address>
  </div>
</div>
</div>



</body>
</html>