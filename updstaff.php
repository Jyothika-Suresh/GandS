<?php
include('dbcon.php');
session_start();

$id=$_GET["edit_id"];
$edit=mysqli_query($con,"SELECT * FROM `reg` WHERE `rid`='$id'");
 $row=mysqli_fetch_array($edit);
echo "$id";

if (isset($_POST["btn"])){
    $name=$_POST["sname"];
    //echo $name;
	$email=$_POST["semail"];
	//echo $email;
	$mobile=$_POST["sphn"];
    //echo $mobile;
	$pass=md5($_POST["spass"]);
	//echo $pass;
	$cnt=$_POST["country"];
	//echo $cnt;
	$state=$_POST["state"];
	//echo $state;
    $address=$_POST["saddress"];
    //echo $address;
  
   
    mysqli_query($con, "UPDATE `reg` SET `name`='$name',`email`='$email',`phone`='$mobile',`country`='$cnt',`state`='$state',`address`='$address',`pass`='$pass',`status`='[value-9]' WHERE `rid`='$id'");
	
	header("location:staff.php");
  
	} 

?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type= "text/javascript" src = "countries.js"></script>
	
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
	
 <?php
							 $result=mysqli_query($con, "SELECT * FROM `reg`");
							 if ($res=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>  
  
  <a>Dashboard</a>
  <a href="staff.php">Profile</a>
  
  <a href="staffdetails.php">Add Details</a>
<br>
<br><br><br><br><br><br><br><br><br><br>
<a href="login.php" ><b>Logout<b></a>
  </div>
 <?php
						 }
							 
						 ?>
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
			<h3>Edit Staff</h3>
			  <form method="POST" action="#" 
			  enctype="multipart/form-data"> 
			  <br><label>Staff Name:</label>
					<input type="text" id="sname" name="sname" value="<?php echo $row["name"];?>">
			<br><label>Staff Email:</label>
					<input type="text" id="semail" name="semail" value="<?php echo $row["email"];?>">
			
			<br><label>Contact Number:</label>
					<input type="text" id="sphn" name="sphn" value="<?php echo $row["phone"];?>">
			  <br><label>Password:</label>
					<input type="text" id="spass" name="spass" placeholder="Enter New Password">
			  <br><label>Country:</label>
					<select onchange="print_state('state',this.selectedIndex);" id="country" class="form-input" name ="country"></select>
				
			<br><label>State:</label>
					<select name ="state" id ="state" class="form-input"></select>
				<script language="javascript">print_country("country");</script>
				
				 <br><label>Address:</label>
					<textarea id="saddress" name="saddress" value="<?php echo $row["address"];?>"></textarea>
					
					<input type="submit"name="btn" value="Update">
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