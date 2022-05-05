<?php
include 'dbcon.php';
if (isset($_POST["assign"]))
{
    $staff=$_POST["staff"];
    $service=$_POST["service"];
    $sql4 = "SELECT * FROM `reg` WHERE `name`= '$staff'";
    $row4 = mysqli_query($con, $sql4);
        if($res4 = mysqli_fetch_assoc($row4))
        {

            $docid = $res4['rid'];
        }
        $sql5 = "SELECT * FROM `service` WHERE `service`= '$service'";
        $row5 = mysqli_query($con, $sql5);
            if($res5 = mysqli_fetch_assoc($row5))
            {
    
                $serid = $res5['ser_id'];
            }    
            $sql7 = "INSERT INTO `assign`(`staff_id`, `ser_id`) VALUES ('$docid','$serid')";
            if(mysqli_query($con, $sql7))
            {
                echo "Success";
            }
            else
            {
                echo mysqli_errno($con);
            }
        }
    
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
<div class="container" >
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Assign</h3>
						
					</div>
					<table>
					
					<form method="POST" action="#" enctype="multipart/form-data"> 
					<label>Staff Name:</label>
                              <select name="staff" id="staff">
                              <option>Select Staff</option>
                              <optgroup>	
							
					<?php
                                    $sql1 = "SELECT * FROM `login` WHERE `type_id` = 3";
                                    $row1 = mysqli_query($con, $sql1);
                                    while($res1 = mysqli_fetch_assoc($row1))
                                    {

                                        $did = $res1['rid'];
                                        echo $did;

                                    $sql = "SELECT * FROM `reg` WHERE `rid` = '$did'";
                                    $row = mysqli_query($con, $sql);
                                    while($res = mysqli_fetch_assoc($row))
                                    {
                                        $dname = $res['name'];
                                        ?>
                                        <option><?php echo $dname; ?></option>
                                        <?php
                                            }

                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            <span style="color: red; margin-left:50px; font-size:12px"></span>
                            <br>
                            <label for="cars">Service Type:</label>
                                <select name="service" id="service">
                                <option>Service Type</option>
                                <optgroup>
                                   <?php
                                    $sql2 = "SELECT * FROM `service` ";
                                    $row2 = mysqli_query($con, $sql2);
                                    while($res2 = mysqli_fetch_assoc($row2))
                                    {
                                        $ser_id = $res2['ser_id'];
										$ser_name = $res2['service'];
                                        echo $ser_id;
                                    ?>
									<option>  <?php echo $ser_name; ?> </option>
                                    
                                        <?php
                                            
									}
                                        
                                        ?> 
                                    </optgroup>
                                </select>
                                <br><br>
                            <input type="submit" name="assign" id="assign" value="Assign">
                            <span style="color: red; margin-left:50px; font-size:12px"></span>
                        </form>
                    </div>
					
					
					
		<!--view-->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Assign Details</h3>
					</div>
					<table>
						
							<tr>
								<th>Staff</th>
								<th>Service</th>
								</tr>
					
						<?php
							  $query="SELECT * FROM assign";
                            $data = mysqli_query($con,$query);
                            while($res8=mysqli_fetch_assoc($data))
                            {
                                $staffid = $res8['staff_id'];
                                $serid = $res8['ser_id'];
                                $query1 = "SELECT * FROM `reg` WHERE `rid` = '$staffid'";
                                $data1 = mysqli_query($con,$query1);
                                while($res9=mysqli_fetch_assoc($data1))
                                {
                                    $staffname = $res9['name'];
                                $query2 = "SELECT * FROM `service` WHERE `ser_id` = '$serid'";
                                $data2 = mysqli_query($con,$query2);
                                while($res10=mysqli_fetch_assoc($data2))
                                {
                                    $sername = $res10['service'];
                          ?>
						<tbody>
							<tr>
								<td><?php echo $staffname;?></td>
								<td><?php echo $sername;?></td>
											 
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