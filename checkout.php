<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<?php
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];

$res= mysqli_query($con,"SELECT * FROM `reg`where email='$vari'");
$r= mysqli_fetch_array($res);

	
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
	//$amt=$_POST['amt'];

if (isset($_POST["bttn"]))
{
	$zip=$_POST['zip'];
	$city=$_POST['city'];
	$ctype=$_POST['ctype'];
	$cname=$_POST['cardname'];
    $cnum=$_POST['cardnumber'];
	$expmnth=$_POST['expmonth'];
	$expyr=$_POST['expyear'];
	$cvv=$_POST['cvv'];
	$query="INSERT INTO `checkout`(`rid`, `city`, `zip`, `ctype`, `cname`, `cnum`, `expmonth`, `expyear`, `cvv`) VALUES ('$rid','$city','$zip','$ctype','$cname','$cnum','$expmnth','$expyr','$cvv')";
		if(mysqli_query($con,$query))
	{
			echo "registered successfully";
			header('location:thnku.php');
		}
		else  
		{
			echo mysqli_errno($con);
		}
}

	
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
	input[type=textbox] {
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
		<h2>Checkout Form</h2>
		<div class="row">
		<div class="col-75">
		<div class="container">
	<form method="POST" action="mycart.php" >

		<table>
		<tr>
		<td><h3>Product</h3></td>
		<td><h3>Amount</h3></td>
		</tr>
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
		<td><img src="image/<?php echo $res['sub_img']; ?>"  width="120px" height="125px">
            <p><?php echo $res['sub_name'];?></p>
		</td>
		<td> Price :  &nbsp;	₹<?php echo $res['sub_price'];?></td>
		<?php
		$total = 0;
	$total += $res["sub_price"] ;
}
}?>	
		</tr>
		</table>
		<!--total-->
		
		</table>
		<br>
		<!--<input type="text" name="total" value="<?php echo $total?>"></input>-->
		<p name="total">total:<?php echo $total?></p>
		<!--ends-->
		<!--total:<?php //echo $_POST["total"];  ?> -->
<input type="submit" class="btn" value="My Cart">
</form>
	  
        </div>
		</div>
		</div>
		</div>
	</div>
	
</div>

<br><br>
<div class="row">
<div class="main">
<div class="row">
  <div class="col-75">
    <div class="container">
	<?php
	$query3="SELECT * from subcat where sub_id ='$produ'"; 
			$data3 = mysqli_query($con,$query3);
			while($res=mysqli_fetch_assoc($data3))
			{
				?>
	
	
	
      <form method="POST" action="#" >
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="name"><i class="fa fa-user"></i> Full Name</label>
            <input type="textbox" id="name" name="name" placeholder="Name" value="<?php ECHO $name; ?>" required>
			
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abc@mail.com" value="<?php ECHO $email; ?>" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Address" value="<?php ECHO $address; ?>" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Your State" value="<?php ECHO $state; ?>" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="685515" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Card</label>
            <div class="ctype">
              <select name="ctype" required>
			  <option value="visa">Visa</option>
			  <option value="master card">Master Card</option>
			  </select>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="c_name" name="c_name" placeholder="Name" required>
              <label>Price</label>
			  <input type="textbox" name="amt" id="amt" placeholder="Enter amt"/><br/><br/>
                <!--    <input type="textbox" name="amt" value="<?php //echo $res['sub_price']; ?>" required>  -->
            
               
                    <input type="hidden" name="amt" value="<?php echo $res['sub_price'];?>">
                    <input type="hidden" name="product_name" value="<?php echo $_GET["sub_name"]?>">
                
			
			<input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
			
			
	<?php 
			}
?>			
			</form>
			<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
			<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_DBgOCjr0mby8sA", 
                        "amount": 50000, 
                        "currency": "INR",
                        "name": "G&S",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
          </div>
          
        </div>
        
        
     
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

</script>

</body>
</html>