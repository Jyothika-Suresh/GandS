<?php
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];
$id=$_GET['id'];
//echo $id;

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
		.product-details{
			background-color: #fff; 
			padding: 30px; border-top-right-radius: 4px; border-bottom-right-radius: 4px; position: relative;
			}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}
.left-column {
  width: 65%;
  position: relative;
}
 
.right-column {
  width: 35%;
  margin-top: 60px;
}
.pdesc {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.pdesc span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.pdesc h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.pdesc p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
.pprice {
  display: flex;
  align-items: center;
}
 
.pprice span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
<!--cart-->
 .content-section {
    margin: 1em;
}

.container2 {
    max-width: 900px;
    margin-top: 10%;
    padding: 0 1.5em;
	position: relative;
    left: 200px;
}
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}
.cart-header {
    font-weight: bold;
    font-size: 1.25em;
    color: #333;
}

.cart-column {
    display: flex;
    align-items: center;
    border-bottom: 1px solid black;
    margin-right: 1.5em;
    padding-bottom: 10px;
    margin-top: 10px;
}

.cart-row {
    display: flex;
}

.cart-item {
    width: 45%;
}

.cart-price {
    width: 20%;
    font-size: 1.2em;
    color: #333;
}

.cart-quantity {
    width: 35%;
}

.cart-item-title {
    color: #333;
    margin-left: .5em;
    font-size: 1.2em;
}

.cart-item-image {
    width: 75px;
    height: auto;
    border-radius: 10px;
}

.btn-danger {
    color: white;
    background-color: #EB5757;
    border: none;
    border-radius: .3em;
    font-weight: bold;
}

.btn-danger:hover {
    background-color: #CC4C4C;
}

.cart-quantity-input {
    height: 34px;
    width: 50px;
    border-radius: 5px;
    border: 1px solid #56CCF2;
    background-color: #eee;
    color: #333;
    padding: 0;
    text-align: center;
    font-size: 1.2em;
    margin-right: 25px;
}

.cart-row:last-child {
    border-bottom: 1px solid black;
}

.cart-row:last-child .cart-column {
    border: none;
}

.cart-total {
    text-align: end;
    margin-top: 10%;
    margin-right: 10px;
}

.cart-total-title {
    font-weight: bold;
    font-size: 1.5em;
    color: black;
    margin-right: 20px;
}

.cart-total-price {
    color: #333;
    font-size: 1.1em;
}
.section-header {
    font-family: "Metal Mania";
    font-weight: normal;
    color: #333;
    text-align: center;
    font-size: 2em;
}

.btn-primary {
    color: white;
    background-color: #56CCF2;
    border: none;
    border-radius: .3em;
    font-weight: bold;
	font-size: 1.4em;
	align:center;
	margin-bottom:5%;
	margin-left:35%
	
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


<div class="row">
 
	
	</div>
	
	<div id="cart">
        <section style="margin-left:10%; border:solid" class="container2 content-section">
            <h2 class="section-header">CART</h2><br>
			<br>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
           <br> 
		   <div class="cart-items">
            </div>
			
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">₹0</span>
            </div>
          <a href="buyerinfo.php" >  <button class="btn btn-primary btn-purchase" type="submit" name="btn" <!--type="button"-->PURCHASE</button></a>
			
        </section>
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

<!--cart-->
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
	} else {
    ready()
	}

	function ready() {
		var removeCartItemButtons = document.getElementsByClassName('btn-danger')
		for (var i = 0; i < removeCartItemButtons.length; i++) {
			var button = removeCartItemButtons[i]
			button.addEventListener('click', removeCartItem)
		}

		var quantityInputs = document.getElementsByClassName('cart-quantity-input')
		for (var i = 0; i < quantityInputs.length; i++) {
			var input = quantityInputs[i]
			input.addEventListener('change', quantityChanged)
		}

		var addToCartButtons = document.getElementsByClassName('cart-btn')
		for (var i = 0; i < addToCartButtons.length; i++) {
			var button = addToCartButtons[i]
			button.addEventListener('click', addToCartClicked)
		}

		document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
	}

	function purchaseClicked() {
		alert('Thankyou..you`ll be redirected to payment..soon..')
		var cartItems = document.getElementsByClassName('cart-items')[0]
		while (cartItems.hasChildNodes()) {
			cartItems.removeChild(cartItems.firstChild)
		}
		updateCartTotal()
	}

	function removeCartItem(event) {
		var buttonClicked = event.target
		buttonClicked.parentElement.parentElement.remove()
		updateCartTotal()
	}

	function quantityChanged(event) {
		var input = event.target
		if (isNaN(input.value) || input.value <= 0) {
			input.value = 1
		}
		updateCartTotal()
	}

	function addToCartClicked(event) {
		var button = event.target
		var shopItem = button.parentElement.parentElement
		var title = shopItem.getElementsByClassName('pname')[0].innerText
		var price = shopItem.getElementsByClassName('pprice')[0].innerText
		var imageSrc = shopItem.getElementsByClassName('pimg')[0].src
		addItemToCart(title, price, imageSrc)
		updateCartTotal()
	}

	function addItemToCart(title, price, imageSrc) 
	{
		var cartRow = document.createElement('div')
		cartRow.classList.add('cart-row')
		var cartItems = document.getElementsByClassName('cart-items')[0]
		var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
		for (var i = 0; i < cartItemNames.length; i++) {
			if (cartItemNames[i].innerText == title) {
				alert('This item is already added to the cart')
				return
			}
		}
		var cartRowContents = `
			<div class="cart-item cart-column">
				<img class="cart-item-image" src="${imageSrc}" width="100" height="100">
				<span class="cart-item-title">${title}</span>
			</div>
			<span class="cart-price cart-column">${price}</span>
			<div class="cart-quantity cart-column">
				<input class="cart-quantity-input" type="number" value="1">
				<button class="btn btn-danger" type="button">REMOVE</button>
			</div>`
		cartRow.innerHTML = cartRowContents
		cartItems.append(cartRow)
		cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
		cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
	}

	function updateCartTotal() {
		var cartItemContainer = document.getElementsByClassName('cart-items')[0]
		var cartRows = cartItemContainer.getElementsByClassName('cart-row')
		var total = 0
		for (var i = 0; i < cartRows.length; i++)
		{
			var cartRow = cartRows[i]
			var priceElement = cartRow.getElementsByClassName('cart-price')[0]
			var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
			var price = parseFloat(priceElement.innerText.replace('₹', ''))
			var quantity = quantityElement.value
			total = total + (price * quantity)
		}
		total = Math.round(total * 100) / 100
		document.getElementsByClassName('cart-total-price')[0].innerText = '₹' + total
	}

</script>

</body>
</html>