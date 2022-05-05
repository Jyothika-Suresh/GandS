<?php
include('dbcon.php');
$cat=$_GET['am'];
$query="SELECT * FROM `cat` where prd_id='$cat' ";
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
<a href="home.php" >Home</a>
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
    <h4>Products</h4>
	<?php
	while ($r=mysqli_fetch_array($result))
	{
	$a=$r['cat_img'];
	$b=$r['cat_name'];
	
	?>
	 <a href="subcat.php?am=<?php echo $r['cat_id'];?>">
		<div class="container" style="position:relative; width:288px ; height:300px; display: inline-block; padding:50px;">
	  <img src="img/<?php echo $a;?> "class="image" ><br>
	  
	  
	  
	  <font face="Bookman Old Style"  color="#0E6251" font size="5" style="text-decoration:none"><?php echo $b;?></font>

		 
	</div></a>
	<?php 
	}
	?>
   
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