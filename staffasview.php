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
	
 <a>Dashboard</a>
  <a href="staff.php">Profile</a>
  
  <a href="staffdetails.php">Add Details</a>
  <a href="staffasview.php">Assigned service</a>
  <a href="reset.php">Reset Password</a>
<br>
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
<div class="container" >
			<div class="table-data">
				
					
		<!--view-->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Assign Details</h3>
					</div>
					<table>
						
							<tr>
								
                                    
								</tr>
					
						<?php
                            
							session_start();
							$vari=$_SESSION['email'];
                        
                        
                             $query="SELECT * FROM `reg` WHERE `email` = '$vari'";
                             $data = mysqli_query($con,$query);
                             while($res=mysqli_fetch_assoc($data))
                             {
                                    $staffid = $res['rid'];
                                
                                $query2 = "SELECT * FROM `assign` WHERE `staff_id` = '$staffid'";
                                $data2 = mysqli_query($con,$query2);
                                while($res10=mysqli_fetch_assoc($data2))
                                {
                                    $serid = $res10['ser_id'];
                                    
                                    $query3 = "SELECT * FROM `service` WHERE `ser_id`='$serid'";
                                    $data3 = mysqli_query($con,$query3);
                                    while($res11=mysqli_fetch_array($data3))
                                    {
                                        $service = $res11['service'];
                                        
                                        
                          ?>
                            
                            <tbody>
                                <tr>
								<th>Assigned Service</th>
                                    <td><p><?php echo $service;?></p></td>
                                   
                                </tr>
                            </tbody>
                            <?php
                                    }
                                }
                            }
                            ?>
					</table>
				</div>
			</div>
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