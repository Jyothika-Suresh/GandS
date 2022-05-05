<?php
include 'dbcon.php';
if (isset($_POST["ok"])){
    $typename=$_POST["tname"];
    
    $sql2="SELECT * FROM `prdttype` WHERE `prd_name`='$typename' ";
	$dup=mysqli_query($con,$sql2);
	if(mysqli_num_rows($dup)>0)
	{
		echo '<script type="text/javascript"> alert("Duplication")</script>';
	}
	else
	{
   
    mysqli_query($con, "INSERT INTO `prdttype`(`prd_name`) VALUES ('$typename')");
   // header("location:addmcat.php");
  
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
 <br>
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
			<h3>Add Main Category</h3>
			  <form method="POST" action="addmcat.php"> 
				<br><label>Category Name:</label>
				<input type="text" id="sub" name="tname" placeholder="Add product name">
				
				<input type="submit"name="ok" value="Add">
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
								<th>Name</th>	
								<th>Edit</th>
								<th>Delete</th>								
							</tr>
						</thead>
						<?php
							 $result=mysqli_query($con, "SELECT * FROM `prdttype`");
							 while ($row=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>   
						<tbody>
							<tr>
				
								<td><?php echo $row["prd_name"];?></td>		
								
								<td><a href="updmcat.php?edit_id=<?php echo $row["prd_id"];?>"><input type="button" value="Edit"></td>	
								<td><a href="mcatdel.php?del=<?php echo $row["prd_id"];?>"><input type="button" value="Delete"></td>								
							</tr>						
						</tbody>
						<?php
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