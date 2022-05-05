<?php
include 'dbcon.php';
if (isset($_POST["ok"])){
    $sname=$_POST["sname"];
     if($_FILES["img"]["tmp_name"]!="")
		$i=$_FILES["img"]["name"];
	//print_r($_FILES);exit;
	else
		$i=$row['sub_img'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
	
	$sprice=$_POST["sprice"];
	$sdesc=$_POST["sdesc"];
	$sspec=$_POST["sspec"];
	
	$a=$_POST['scat'];	
	$query="SELECT * FROM `cat` WHERE cat_name='$a'";
	$data=mysqli_query($con,$query);
	if($res=mysqli_fetch_array($data))
	{
		$ker=$res['cat_id'];	
	
$sql="INSERT INTO `subcat`( `cat_id`, `sub_name`, `sub_img`, `sub_price`,`sub_desc`,`sub_spec`,`status`) VALUES ('$ker','$sname','$i','$sprice','$sdesc','$sspec',0)";
    if (mysqli_query($con,$sql))
{
	echo "Success";
	
}
else
{
echo mysqli_errno($con);
}
}
}
?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admin.css">

	<title>GS Admin</title>
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
</style>

</head>
<body>

	<!-- SIDEBAR -->
	<div class="sidenav">
	<a class="navbar-brand" href="/">
      <div class="logo-image">
            <img src="image/logo3.png" class="img-fluid"/>
      </div>
	</a>
	
 <a href="aregdtls.php">Registration Details</a>
  <a href="addmcat.php">Category Type</a>
  <a href="addcat.php">Category</a>
  <a href="addprd.php">Add Product</a>
  <a href="amsgs.php">Messages</a>
  <a href="addstaff.php">Add Staff</a> <br><br><br><br><br><br><br><br><br><br>
<a href="login.php" ><b>Logout<b></a>
  <!--<button class="dropdown-btn">Dropdown 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  <a href="#contact">Search</a> -->
</div>	
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				
				</div>
				
			</div>
			<div class="container" >
			<h3>Add Product</h3>
			  <form method="POST" action="#" enctype="multipart/form-data">
			  <br><label>Category Name:</label>
					<select required name="scat" id="cat">
					<optgroup>
					<?php
					include 'dbcon.php';
					$query="SELECT * FROM `cat`";
					$data=mysqli_query($con,$query);
						while($res=mysqli_fetch_assoc($data))
						{
							?>
							<option><?php echo $res['cat_name'];?></option>
					<?php	}
					?>
					</optgroup>
					</select>
			  <br><label>Product Name:</label>
					<input type="text" id="sname" name="sname" placeholder="Add product name">
				 <label>Image:</label>
					<input type="file" id="image" name="img" accept="image/gif,image/png,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
					<br>
					<br><label>Price:</label>
					<input type="text" id="sprice" name="sprice" placeholder="Add Price">
					
					<br><label>Description:</label>
					<input type="text" id="sdesc" name="sdesc" placeholder="Add Description">
					
					<br><label>Specification:</label>
					<input type="text" id="sspec" name="sspec" placeholder="Add Specification">
					
					
				<input type="submit" name="ok" value="Add">
			  </form>
			</div>
			
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Type Details</h3>
					</div>
				<table>
						<thead>
							<tr>
							
								
								<th>Category Name</th>
								<th>Product Name</th>								
								<th>Image</th>
								<th>Price</th>	
								<th>Description</th>	
								<th>Specification</th>
								<th>Edit</th>	
								<th>Inactive</th>
								<th>Active</th>
								<th>Status</th>									
							</tr>
						</thead>
						<?php
							 $result=mysqli_query($con, "SELECT * FROM `cat`");
							 if($row=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>   
						<tbody>

							  <?php
									  include('dbcon.php');
									  
									  $query="SELECT subcat.sub_id,cat.cat_name,subcat.sub_name,subcat.sub_img,subcat.sub_price,subcat.sub_desc,subcat.sub_spec,subcat.status 
									  FROM `cat` JOIN `subcat` ON(cat.cat_id=subcat.cat_id);";
							$data = mysqli_query($con,$query);
								while($res=mysqli_fetch_assoc($data))
								{
									?>
									<tr>
									
									<td><?php echo $res["cat_name"];?></td>
									<td><?php echo $res["sub_name"];?></td>	
									<td><img src = "img/<?php echo $res["sub_img"]?>" height="100" width="100"/></td>								
									<td><?php echo $res["sub_price"];?></td>	
									<td><?php echo $res["sub_desc"];?></td>	
									<td><?php echo $res["sub_spec"];?></td>	<td><a href="updprd.php?edit_id=<?php echo $res["sub_id"];?>"><input type="button" value="Edit"></td>									
									<!--<td><a href="delprd.php?del=<?php echo $res["sub_id"];?>"><input type="button" value="Delete"></td> -->
									<td><a href="pdtinactive.php?aa=<?php echo $res['sub_id'];?>"><input type="button" value="Inactive"></td>
									<td><a href="pdtactive.php?bb=<?php echo $res['sub_id'];?>"><input type="button" value="active"></td>
									</tr>
									<td><?php echo $res['status'];?> </td>
															
						</tbody>
						<?php
						 }
							 }
						 ?>
				</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</body>
</html>