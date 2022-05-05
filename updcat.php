<?php
include('dbcon.php');
session_start();
$id=$_GET["edit_id"];
echo "$id";
$edit=mysqli_query($con,"SELECT * FROM `cat` WHERE `cat_id`='$id'");
$row=mysqli_fetch_assoc($edit);

if(isset($_POST["ok"]))
{
  $b=$_POST["cat"];
  $query="SELECT * FROM `prdttype` WHERE prd_name='$b' "; 
$data = mysqli_query($con,$query);
if($res=mysqli_fetch_assoc($data))
{
	$ker=$res['prd_id'];
  
  $name=$_POST["cname"];
  //echo $name;
  
 if($_FILES["img"]["tmp_name"]!="")
		$i=$_FILES["img"]["name"];//2d array type inst of name return type size
	//print_r($_FILES);exit;
	else
		$i=$row['img'];
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/".$_FILES["img"]["name"]);
   mysqli_query($con,"UPDATE `cat` SET `prd_id`='$ker',`cat_name`='$name',`cat_img`='$i' WHERE `cat_id`='$id';");
 
   echo 'edited successfully';
   header("location:addcat.php");
 }
 $edit=mysqli_query($con, "SELECT * FROM `cat` WHERE `cat_id`='$id'");
$row=mysqli_fetch_array($edit);
}
?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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
			  <form method="POST" action="#" 
			  enctype="multipart/form-data"> 
				
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
					 <br><label>Category Name:</label>
				<input type="text" id="sub" name="cname" value="<?php echo $row["cat_name"];?>">
				<label>Photo:</label>
				<img src="img/<?php echo $row["cat_img"];?>" width="50px" height="50px"/>
				<input type="file" id="image" name="img" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png"  >
				<br/><br/>
				<input type="submit"name="ok" value="Update">
			  </form>
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