<?php
include 'dbcon.php';
if (isset($_POST["ok"])){
    $cname=$_POST["cname"];
     if($_FILES["img"]["tmp_name"]!="")
	 {
		$i=$_FILES["img"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	 }
	else{
		$i=$row['img'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
	}
	$a=$_POST['cat'];
$sql2="SELECT * FROM `cat` WHERE `cat_name`='$cname' ";
$dup=mysqli_query($con,$sql2);
if(mysqli_num_rows($dup)>0)
	{
		echo '<script type="text/javascript"> alert("Duplication")</script>';
	}
else{	
	$query="SELECT * FROM `prdttype` WHERE prd_name='$a'";
	$data=mysqli_query($con,$query);
	if($res=mysqli_fetch_assoc($data))
	{
		$ker=$res['prd_id'];

$sql="INSERT INTO `cat`( `prd_id`, `cat_name`, `cat_img`, `cat_status`) VALUES ('$ker','$cname','$i',0)";
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
}

?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
  <br>
  <a href="addstaff.php">Add Staff</a>
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
			<h3>Add Category</h3>
			  <form method="POST" action="#" enctype="multipart/form-data">
			  <br><label>Product type:</label>
					<select required name="cat" id="cat">
					<optgroup>
					<?php
					include 'dbcon.php';
					$query="SELECT * FROM `prdttype`";
					$data=mysqli_query($con,$query);
						while($res=mysqli_fetch_assoc($data))
						{
							?>
							<option><?php echo $res['prd_name'];?></option>
					<?php	}
					?>
					</optgroup>
					</select>
			  <br><label>Category Name:</label>
					<input type="text" id="sub" name="cname" placeholder="Add product name">
				 <label>Image:</label>
					<input type="file" id="image" name="img" accept="image/gif,image/png,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
					
					
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
								<th>Type Name</th>
								<th>Category Name</th>
								<th>Image</th>		
								<th>Edit</th>
								<th>Delete</th>								
							</tr>
						</thead>
						<?php
							 $result=mysqli_query($con, "SELECT * FROM `prdttype`");
							 if ($row=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>   
						<tbody>

							  <?php
									  include('dbcon.php');
									  
									  $query="SELECT cat.cat_id,prdttype.prd_name,cat.cat_name,cat.cat_img
									  FROM `prdttype` JOIN `cat` ON(prdttype.prd_id=cat.prd_id);";
							$data = mysqli_query($con,$query);
								while($res=mysqli_fetch_assoc($data))
								{
									?>
									<tr>
									
									<td><?php echo $res["prd_name"];?></td>
									<td><?php echo $res["cat_name"];?></td>	
									<td><img src = "img/<?php echo $res["cat_img"]?>" height="100" width="100"/></td>								
									<td><a href="updcat.php?edit_id=<?php echo $res["cat_id"];?>"><input type="button" value="Edit"></td>	
									<td><a href="delcat.php?del=<?php echo $res["cat_id"];?>"><input type="button" value="Delete"></td>
									</tr>
															
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