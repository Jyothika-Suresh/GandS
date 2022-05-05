<?php
session_start();
include("dbcon.php");


//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
		if(!empty($_POST["quantity"])) {
			$pid=$_GET["pid"];
			$result=mysqli_query($con,"SELECT * FROM subcat WHERE sub_id='$pid'");
	          while($productByCode=mysqli_fetch_array($result)){
				$itemArray = array($productByCode["name"]=>array('name'=>$productByCode["name"],  'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["name"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["name"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	}
	break;

	// code for removing product from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>


<!DOCTYPE html>
<HEAD>
<TITLE> G&S </TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</HEAD>


<BODY>


<!-- Cart ---->
<div id="product-cart">
<div class="txt-heading">Product Cart</div>

<a id="btnEmpty" href="addtocart.php?action=empty"><i class="fas fa-shopping-cart"></i> Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>
<div class="shopping-cart-table">
            <div class="cart-item-container header">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>
            </div>
<?php
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" />
                <?php echo $item["name"]; ?></td>
				
				<td style="text-align:right;"> <input type = "text" value="<?php echo $item["quantity"]; ?>"></td>
				<td  style="text-align:right;"><?php echo $item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo  number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="addtocart.php?action=remove&code=<?php echo $item["name"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo number_format($total_price, 2); ?></strong></td> 
	</tr>
	<tr>
	
                      &nbsp;  <td>
                        <button type="button" class="btn btn-primary"> Continue Shopping </button>
					    </td>
                        <td>
                        <button type="button" class="btn btn-primary"> Checkout  </button>
                        </td>

</tr> 
</tbody>
</table>
  <?php
}
else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>




<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product= mysqli_query($con,"SELECT * FROM tbl_product ORDER BY id ASC");
	if (!empty($product)) {
		while ($row=mysqli_fetch_array($product)) {

	?>
        <div class = "row">
		<div class="col-md-6 col-lg-4 col-xl-3">
		<div class="product-item">
			<form method="post" action="addtocart.php?action=add&pid=<?php echo $row["id"]; ?>">
            
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?php echo $row['image']?>" alt="Card image cap" width = "290px" height = "150px">
  <div class="card-body">
    <h5 class="card-title" style = "margin-left:10px"><?php echo $row["name"]; ?></h5>
    <p class="card-text" style = "margin-left:10px"><?php echo $row["price"]; ?></p>
    <div class="cart-action" >
	<input type="text" class="product-quantity" name="quantity" value="1" size="2" />
    <input type="submit" value="Add to Cart" class="btnAddAction" style = "margin-top: -33px; padding: 6px 10px;" /> 
	
  </div>
</div>
			
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "No Records.";

	}
	?>
</div>



</BODY>
</html>
