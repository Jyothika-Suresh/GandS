<?php
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];

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
	* {
	  box-sizing: border-box;
	}

	.row {
	  display: -ms-flexbox; /* IE10 */
	  display: flex;
	  -ms-flex-wrap: wrap; /* IE10 */
	  flex-wrap: wrap;
	  margin: 0 -16px;
	}

	.col-25 {
	  -ms-flex: 25%; /* IE10 */
	  flex: 25%;
	}

	.col-50 {
	  -ms-flex: 50%; /* IE10 */
	  flex: 50%;
	}

	.col-75 {
	  -ms-flex: 75%; /* IE10 */
	  flex: 75%;
	}

	.col-25,
	.col-50,
	.col-75 {
	  padding: 0 16px;
	}

	.container {
	  background-color: #f2f2f2;
	  padding: 5px 20px 15px 20px;
	  border: 1px solid lightgrey;
	  border-radius: 3px;
	}

	input[type=text] {
	  width: 100%;
	  margin-bottom: 20px;
	  padding: 12px;
	  border: 1px solid #ccc;
	  border-radius: 3px;
	}

	label {
	  margin-bottom: 10px;
	  display: block;
	}

	.ctype {
	  margin-bottom: 20px;
	  padding: 7px 0;
	  font-size: 24px;
	}
	select{
		width: 100%;
	  margin-bottom: 20px;
	  padding: 12px;
	  border: 1px solid #ccc;
	  border-radius: 3px;
	}

	.btn {
	  background-color: #032a23;
	  color: white;
	  padding: 12px;
	  margin: 10px 0;
	  border: none;
	  width: 100%;
	  font-weight:bold;
	  border-radius: 3px;
	  cursor: pointer;
	  font-size: 17px;
	}

	.btn:hover {
	  background-color: #ccc;
	  color:black;
	}

	a {
	  color: #2196F3;
	}

	hr {
	  border: 1px solid lightgrey;
	}

	span.price {
	  float: right;
	  color: grey;
	}


	@media (max-width: 800px) {
	  .row {
		flex-direction: column-reverse;
	  }
	  .col-25 {
		margin-bottom: 20px;
	  }
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
<a href="contact.php" class="right">Contact</a>
  <a href="login.php" class="right">Login</a>
  <a href="profile.php" class="right">Profile</a>
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
  <center>
  <br><img src="image/p.png" style="width:60%" "height:60%">
  </center>

          
        </div>
        

      </form>
    </div>
  </div>
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
<script type="text/javascript">
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

<!--payment-->

	function chkcrd()
	{
		if(document.getElementById('cnum').value.length==0 || 
		document.getElementById('cname').value.length==0 || 
		document.getElementById('cvv').value.length==0)
		{
			alert("Fill The Card Details");
			return false;
		}
		else
		{
			var num=/^([0-9_\-]{3})+$/;
			var num1=/^([0-9_\-]{16})+$/;
			   if(document.getElementById("cnum").value.match(num1))
			{}
		else
		{
			alert("Entered Invaild Card Number");
			document.getElementById("cnum").focus();
			return false;
		}

		if(document.getElementById("cvv").value.match(num))
		{}
		else
		{
			alert("Entered Invalid CVV");
			document.getElementById("cvv").focus();
			return false;
		}
		}
	}
	 	 
</script>

</body>
</html>