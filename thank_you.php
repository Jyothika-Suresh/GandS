<?php
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];


?>
<html>
<head>
	<title>G&S Home</title>
	
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
 margin-top:5px;

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
  position: relative;
  
}
.cart-btn:hover {
  background-color: #64af3d;
}
.cart-header {
    font-weight: bold;
    font-size: 1.25em;
    color: #333;
}
.center {
  margin: 0;
  position: absolute;
  top: 105%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.imageContainer {
   
   
  
  
   
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

<!--navbar-->

	<div class="pdesc">
		<span></span>

		<center>
		
		<h1 class="pname" style="" >THANK YOU</h1>
			</div>
			
		<center><a href="createpdf.php" class="cart-btn">Download Receipt</a></center>
		<table>
		  <thead>
		<tr>
      <th scope="col">Serial No:</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
     
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
    <input  type='hidden'name='Item'value='$value[Item]'>
    </form>
    </td>
    <td class='itotal'></td>
    <td>
    
    </td>
</tr>
";
}
}
?>
    
    
  </tbody>
		</table>
		 <h4>Grand Total:</h4>
<h5 class="text-right"id="gtotal" style="font-size: 18px;font-weight: bold;"></h5>
<br>


	
			
		<!-- <img src="image/pay3.gif" style="margin-left:370px; position: center; top: -50px; "/>-->
	
		</center> 

	<div class="center">
		<a href="home.php" class="cart-btn">BACK TO HOME</a>
		</div>
	

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