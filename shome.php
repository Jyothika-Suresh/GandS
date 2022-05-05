<?php
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];

$query="SELECT `sub_id`,`sub_name`, `sub_img`, `sub_price` FROM `subcat`";
$result=mysqli_query($con,$query);
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
		.image{
		display:block;
		width:200px;
		height:300px;
	
}
<!--btn-->
.button {
  background-color: #659b67 /* Green */
  border-radius: 7px;
  color: white;

  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
   
}

.button1 {
  background-color: #659b67; 
  color: white; 
  border: 2px solid #659b67;
  text-decoration: none;
  border-radius: 7px;
 padding: 15px 40px;
 font-family:Helvetica;
 font-weight:bold;
 
}
.font{
       
    font-family:Helvetica;
    font-size:25px;
    font-weight:bold;
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
	  <img height="270" width="1347" src="image/slide1.jpg" >
	 
	</div>

	<div class="mySlides fade">
	  <div class="numbertext">2 / 3</div>
	  <img height="270" width="1347" src="image/slide2.jpg" >
	  
	</div>

	<div class="mySlides fade">
	  <div class="numbertext">3 / 3</div>
	  <img height="270" width="1347" src="image/slide3.png" >
	  
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
	<center>
	
    <h2 style="font-family:Helvetica;color:497B5C;">Product Servicing</h2>
	<h3 class="font">We will take care of your products..</h3>
	 <a href="service.php" class="button button1">Send Service Request</a>
	 </center><br>
	<br><p>
	<dl style="text-align: justify;">
	  <dt style="font-family:Segoe UI;color:#032a23;font-weight:bold;/" >Centrifugal Pumps</dt><br>
		<dt style="font-weight:bold;">> Bearing Frame And Foot </dt><dd>– inspect for cracks, roughness, rust or scale. Machined surfaces should be free of pitting or erosion.</dd>
		<dt style="font-weight:bold;">> Shaft And Sleeve </dt><dd>– inspect for grooves or pitting. Check bearing fits and shaft runout, and replace the shaft and sleeve if worn or if the shaft runout is greater than 0.002 inches.</dd>
		<dt style="font-weight:bold;">> Bearing Housing </dt><dd>– inspect for signs of wear, corrosion, cracks or pits. Replace housings if worn or out of tolerance.</dd>
		<dt style="font-weight:bold;">> Shaft </dt><dd>– check the shaft for any evidence of corrosion or wear and straightness. Noting that the maximum total indicator reading (TIR) at the sleeve journal and coupling journal should not exceed 0.002 inches.</dd>
	  
	</dl>
	
	</p>
  
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
<script type= "text/javascript" >
   function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null }; 
</script>