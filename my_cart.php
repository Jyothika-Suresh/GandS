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
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>G&S Home</title>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style1.css">
<title>Cart</title>
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




<!--cart begins-->
<center>
        <h1> My Cart</h1>
</center>
<div class="container">
    
<div class="col-lg-8">

<table class="table">
  <thead class="text-center">
    <tr>
      <th scope="col">Serial No:</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody class ="text-center">
<?php
if(isset($_SESSION['cart']))
{
foreach($_SESSION['cart'] as $key => $value)
{
    $sr=$key+1;
   
    echo"
    <tr>
    <td>$sr</td>
    <td>$value[Item]</td>
    <td>$value[Price]<input type='hidden'class='iprice'value='$value[Price]'></td>
    <td>
    <input class ='text-center iquantity'onchange='subTotal()' type='number' value='$value[Quantity]'min='1' max='10'>
    <input  type='hidden'name='Item'value='$value[Item]'>
    </form>
    </td>
    <td class='itotal'></td>
    <td>
    <form action='manage_cart.php'method='POST'>
    <button  name='Remove_Item'class='btn btn-sm btn-outline-danger'>REMOVE</button>
   <input  type='hidden'name='Item'value='$value[Item]'>
    </form>
    </td>
</tr>
";
}
}
?>
    
    
  </tbody>
</table>
<div class="col-lg-9">
    <div class="border bg-light rounded p-4">
        <h4>Grand Total:</h4>
<h5 class="text-right"id="gtotal" style="font-size: 18px;font-weight: bold;"></h5>
<br>
<?php

if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{
?>
</div>
</div>
</div>
</div>
<br><br>
<!--checkout starts-->
<div class="container">
<form method="POST" action="#" >
  <h3>Billing Address</h3><br>     
        <div class="row">

            <label for="name"><i class="fa fa-user"></i> Full Name</label>
            <input type="textbox" id="name" name="name" placeholder="Name" value="<?php ECHO $name; ?>" required>
			
            <!--<label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="abc@mail.com" value="<?php //ECHO $email; ?>" required>-->
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

			</form>
			<?php 
			}
?>	
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
			<script>
			
    function pay_now(){
		//name and pincode validation 
		var firstName=document.getElementById("name");
		if (firstName.value===""){
		alert("Please enter your name");
		firstName.focus();
		return false;
		}
		var postcode=document.getElementById("zip");
		if (postcode.value.length!=6  || isNaN(postcode.value)){
			alert("Please enter 6 digit pincode");
			postcode.focus();
            return false;
            }

		
		
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_DBgOCjr0mby8sA", 
                        "amount": gt * 100, 
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
<input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()" class="btn"/>
			  <br/><br/>
</div> 

</div>
</div>
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
<!--cart total-->
<script>
var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');
function subTotal()
{
    gt=0;
    for(i=0;i<iprice.length;i++)
    {
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
       
        gt=gt+(iprice[i].value)*(iquantity[i].value);
    }
    gtotal.innerText=gt;
}


subTotal();
    </script>

</body>
</html>