<?php
include 'dbcon.php';
if (isset($_POST["btn"]))
{
	
    $gender=$_POST["gender"];
    $age=$_POST["age"];
	$spec=$_POST["spec"];
	$q=$_FILES["quali"]["name"];
	move_uploaded_file($_FILES["quali"]["tmp_name"],"img/".$_FILES["quali"]["name"]);
	$i=$_FILES["idp"]["name"];
	move_uploaded_file($_FILES["idp"]["tmp_name"],"img/".$_FILES["idp"]["name"]);
	$p=$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"img/".$_FILES["photo"]["name"]);

    mysqli_query($con, "INSERT INTO `staffdet`(`staff_gender`, `staff_dob`, `staff_spec`, `staff_quali`, `staff_idp`, `staff_photo`)
	 VALUES ('$gender','$age','$spec','$q','$i','$p')");
	header('location:staffdetails.php');
	}
?>

<!DOCTYPE html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type= "text/javascript" src = "countries.js"></script>
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
	
  <a>Dashboard</a>
  <a href="staff.php">Profile</a>

  <a href="staffdetails.php">Add Details</a>
  <a href="spass.php">Set Password</a>
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
				
				</div>
				
			</div>
			<div class="container" >
			<h3>Add Details</h3>
			  <form method="POST" action="#" enctype="multipart/form-data">
			  <?php
						   session_start();
						   $vari = $_SESSION['email'];
						   $sql = "SELECT * FROM `reg` WHERE `email`= '$vari'";
						   $data = mysqli_query($con, $sql);
						   if($row = mysqli_fetch_array($data))
						   {

						 ?>
			  <br><label>Staff Name:</label>
					<label><?php ECHO $row['name'] ;?></label>
			
			<br><br>
					<?php
				}
				?>
					
				<br><label>Gender:</label>
								<input type="radio" id="gender" name="gender" value="Male">
                            	<label for="male">Male</label>
                            	<input type="radio" id="gender" name="gender" value="Female">
                            	<label for="age2">Female</label><br>  <br>
							<br><label>DOB:</label>
    						<input type="date" id="age" name="age" placeholder="Age"><br><br>
							<br><label>Highest Qualification:</label>
    						<input type="text" id="spec" name="spec" placeholder="Highest Qualification">
							<span style="color: red; margin-left:55px; font-size:12px"></span>
							<br><label>Highest Qualification Document:</label>
    						<input type="file" id="quali" name="quali">
							<br><br><label>Id Proof:</label>
    						<input type="file" id="idp" name="idp"><br>
							<br><label>Photo:</label>
    						<input type="file" id="photo" name="photo"><br>	
				<input type="submit" name="btn" value="Add">
				
			  </form>
			</div>
	<!--Staff view-->
	<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>View</h3>
					</div>
				<table>
						<thead>
							<tr>
								
								<th>Gender</th>
								<th>DOB </th>
<th>Qualification </th>
<th>Qual.Doc </th>
<th>Id proof </th>
<th>Photo </th>								
								
								
							</tr>
						</thead>
						<?php
							 $result=mysqli_query($con, "SELECT * FROM `staffdet`");
							  while ($res=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>   
						<tbody>

									<tr>
									
									<td><?php echo $res["staff_gender"];?></td>
									<td><?php echo $res["staff_dob"];?></td>
<td><?php echo $res["staff_spec"];?></td>
<td><?php echo $res["staff_quali"];?></td>
<td><?php echo $res["staff_idp"];?></td>
<td><img src = "img/<?php echo $res["staff_photo"];?>" height="100" width="100"/></td>
															
									
									
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