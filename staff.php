<?php
include 'dbcon.php';
session_start();
$vari=$_SESSION["email"];
echo $vari;
$result4 = mysqli_query($con,"SELECT * FROM `reg` where `email`='$vari' ");
while($row3 = mysqli_fetch_array($result4))
{
$rid=$row3["rid"];
$name=$row3["name"];
    //echo $name;
	$email=$row3["email"];
	//echo $email;
	$mobile=$row3["phone"];
    //echo $mobile;
	$cnt=$row3["country"];
	//echo $cnt;
	$state=$row3["state"];
	//echo $state;
    $address=$row3["address"];
    //echo $address;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admin.css">

	<title>GS Admin</title>
	<style>
	input[type=button] {
  background-color: #0e6235;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
	
 
  
 <a>Dashboard</a>
  <a href="staff.php">Profile</a>
  
  <a href="staffdetails.php">Add Details</a>
  <a href="staffasview.php">Assigned service</a>
  <a href="reset.php">Reset Password</a>
<br>
<br><br><br><br><br><br><br><br><br><br>
<a href="login.php" ><b>Logout<b></a>
 
</div>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				<h2>Welcome  <?php ECHO $vari;?></h2>
				</div>
				
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Registration Details</h3>
					</div>
					<table>
						<thead>
							<tr>
								<th>Name</th>
								<td><?php echo $name;?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $email;?></td>
							</tr>
							<tr>
								<th>Phone</th>
								<td><?php echo $mobile;?></td> 
							</tr>
							<tr>
								<th>Country</th>
								<td><?php echo $cnt;?></td>
							</tr>
							<tr>
								<th>State</th>
								<td><?php echo $state;?></td>
							</tr>
							<tr>
								<th>Address</th>
								<td><?php echo $address;?></td> 
	
							</tr>
							<tr>
								<th> </th>
								<td><a href="updstaff.php?edit_id=<?php echo $rid ?>"><input type="button" value="Edit"></td> 
	
							</tr>
						</thead>
					
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