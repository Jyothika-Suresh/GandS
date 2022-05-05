<?php
include 'dbcon.php';
session_start();
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

    $sql="INSERT INTO `reg`(`name`, `email`, `phone`, `country`, `state`, `address`, `pass`, `status`) VALUES ('$name','$email','$mobile','$cnt','$state','$address','$pass',0)";
    //header("location:view.php");
	
	if(mysqli_query($con,$sql))
    {  
        $sql2= "SELECT * FROM `reg` WHERE `email`='$email'";
        $data=mysqli_query($con,$sql2);
        if($res=mysqli_fetch_assoc($data))
        {
            $sql3="SELECT * FROM `usertype` WHERE `type_name`='staff'";
            $data1=mysqli_query($con,$sql3);
            if($row=mysqli_fetch_assoc($data1))
            {
                $reg=$res['rid'];
                $type=$row['type_id'];
                $sql4="INSERT INTO `login` (`rid`,`type_id`) VALUES ('$reg','$type')";
                if(mysqli_query($con,$sql4))
                {
                    echo "success";
                }
                else
                {
                    echo mysqli_errno($con);
                }
            }
        }
    }       
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
	
  <a href="aregdtls.php">Registration Details</a>
  <a href="addmcat.php">Category Type</a>
  <a href="addcat.php">Category</a>
  <a href="addprd.php">Add Product</a>
  <a href="amsgs.php">Messages</a>
  <a href="addstaff.php">Add Staff</a> <br><br><br><br><br>
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
			<h3>Add Category</h3>
			  <form method="POST" action="#" enctype="multipart/form-data">
			  <br><label>Staff Name:</label>
					<input type="text" id="sname" name="sname" placeholder="Add Staff name">
			<br><label>Staff Email:</label>
					<input type="text" id="semail" name="semail" placeholder="Add Staff Email">
			<br><label>Password:</label>
					<input type="text" id="spass" name="spass" placeholder="Add Staff Password">
			<br><label>Contact Number:</label>
					<input type="text" id="sphn" name="sphn" placeholder="Add Staff Contact Number">
			  
			  <br><label>Country:</label>
					<select onchange="print_state('state',this.selectedIndex);" id="country" class="form-input" name ="country"></select>
				
			<br><label>State:</label>
					<select name ="state" id ="state" class="form-input"></select>
				<script language="javascript">print_country("country");</script>
				
				 <br><label>Address:</label>
					<textarea id="saddress" name="saddress" placeholder="Add Staff Address"></textarea>
					
					
					
				<input type="submit" name="btn" value="Add">
			  </form>
			</div>
			
	<!--Staff view-->
	<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Type Details</h3>
					</div>
				<table>
						<thead>
							<tr>
								<th>Staff Name</th>
								<th>Staff Email</th>
								<th>Staff Phone </th>
<th>Country </th>
<th>State </th>
<th>Staff Address </th>
<th>Staff Password </th>								
								<th>Edit Staff</th>
								
							</tr>
						</thead>
						<?php
							 $result=mysqli_query($con, "SELECT * FROM `reg`");
							  while ($res=mysqli_fetch_array($result)){
								 //print_r($row);
						 ?>   
						<tbody>

									<tr>
									
									<td><?php echo $res["name"];?></td>
									<td><?php echo $res["email"];?></td>
<td><?php echo $res["phone"];?></td>
<td><?php echo $res["country"];?></td>
<td><?php echo $res["state"];?></td>
<td><?php echo $res["address"];?></td>
<td><?php echo $res["pass"];?></td>									
																	
									<td><a href="updstaff.php?edit_id=<?php echo $res["rid"];?>"><input type="button" value="Edit"></td>	
									
									</tr>
															
						</tbody>
						<?php
						 }
							 
						 ?>
				</table>
				<td><a href="createpdf.php"><input type="button" value="Generate pdf"></td>	
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