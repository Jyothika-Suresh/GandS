<?php
include('dbcon.php');
session_start();
$vari=$_SESSION["email"];
//echo $vari;
$res= mysqli_query($con,"SELECT * FROM `reg`where email='$vari'");
while($r= mysqli_fetch_array($res))
{
	 $rid=$r['rid'];
 $name=$r['name'];
    //echo $name;
	$email=$r['email'];
	//echo $email;
	$mobile=$r['phone'];
    //echo $mobile;	
	$cnt=$r['country'];
	//echo $cnt;
	$state=$r['state'];
	//echo $state;
    $address=$r['address'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>G&S Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type= "text/javascript" src = "countries.js"></script>
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
<style>



input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #0e6235;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=button] {
  background-color: #0e6235;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #2a965c;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left:2%;
  margin-top:3%;
}
.main {
  margin-left: 200px; 
  margin-right:300px;
  font-size: 20px; 
  padding: 0px 10px;
}
</style>
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
<a href="login.php" class="right">Logout</a>
  <a href="contact.php" class="right">Contact</a>
  <a href="profile.php" class="right">Profile</a>
   <a href="shome.php" class="right">Service</a>
   <a href="my_cart.php" class="right">Cart</a>
   <a href="about.php" class="left">About</a>
</div>
<!--slider starts-->
<div class="slideshow-container">
<br>
	<div class="mySlides fade">
	  <div class="numbertext">1 / 3</div>
	  <img height="240" width="1347" src="image/slide1.jpg" >
	 
	</div>

	<div class="mySlides fade">
	  <div class="numbertext">2 / 3</div>
	  <img height="240" width="1347" src="image/slide2.jpg" >
	  
	</div>

	<div class="mySlides fade">
	  <div class="numbertext">3 / 3</div>
	  <img height="240" width="1347" src="image/slide3.png" >
	  
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<!--slider ends-->

<div class="row">
 
  <div class="main">
    <div class="container" >
			<h3>Profile</h3>
			  <form method="POST" action="updprofile.php" enctype="multipart/form-data">
			<table>
			<tr>
				<th>Name</th>
				<td>&nbsp;&nbsp;<?php ECHO $name; ?></td>
			</tr>
			<tr>
				<th>Email</th>
				<td>&nbsp;&nbsp;<?php ECHO $email; ?></td>
			  
			</tr>
			<tr>
				<th>Phone</th>
				<td>&nbsp;&nbsp;<?php ECHO $mobile; ?></td>
			</tr>
			<tr>
				<th>Country</th>
				<td>&nbsp;&nbsp; <?php ECHO $cnt; ?></td>
			</tr> 
			<tr>
				<th>State</th>
				<td>&nbsp;&nbsp;	<?php ECHO $state; ?></td>
			</tr>
			<tr>
				<th>Address</th>
				<td>&nbsp;&nbsp;<?php ECHO $address; ?></td>
			</tr>
			</table>			
			<a href="updprofile.php?as<?php echo $rid;?>"><input type="submit" name="oks" value="Edit"></a>
			  </form>
			</div>
	
	

   
    
   
  </div>
</div>

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
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html>

