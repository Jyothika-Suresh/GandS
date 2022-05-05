<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admin.css">

	<title>GS Admin</title>
	
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
  <br><br><br><br><br><br><br><br><br><br>
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

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Requested Services</h3>
					</div>
					<table>
						
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Country</th>
								<th>State</th>
								<th>Address</th>
	
							</tr>
					
						<?php
							 $result=mysqli_query($con, "SELECT * FROM `service`");
							 while ($row=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>   
						<tbody>
							<tr>
								<td><?php echo $row["oname"];?></td>
								<td><?php echo $row["ophn"];?></td>
								<td><?php echo $row["oaddress"];?></td>  
								<td><?php echo $row["mtype"];?></td>  
								<td><?php echo $row["mname"];?></td>  
								<td><?php echo $row["pyear"];?></td> 
												 
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