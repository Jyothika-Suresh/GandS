<?php
include('dbcon.php');
session_start();
$vari=$_SESSION['email'];
//$res= mysqli_query($con,"SELECT * FROM `reg`where email='$vari'");
//$r= mysqli_fetch_array($res);
	//$rid=$r['rid'];
	//$name=$r['name'];
    //echo $name;
	//$email=$r['email'];
	//echo $email;
	///$mobile=$r['phone'];
    //echo $mobile;	
	
    //$address=$r['address'];
	//$amt=$_POST['amt'];

if (isset($_POST["ok"])){
    $oname=$_POST["oname"];
	$ophn=$_POST["ophn"];
	$oaddress=$_POST["oaddress"];
	$service=$_POST["service"];
	$mtype=$_POST["mtype"];
	$mname=$_POST["mname"];
	$pyear=$_POST["pyear"];
	


$sql="INSERT INTO `service`(`oname`, `ophn`, `oaddress`,`mtype`, `mname`, `pyear`,`service`) VALUES ('$oname','$ophn','$oaddress','$mtype','$mname','$pyear','$service')";
    if (mysqli_query($con,$sql))
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
<title>G&S Home</title>
	<meta charset="UTF-8">
	<link href="css/main.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="css/style1.css">
<style>
		.logo-image img{
		width: 200;
		height: 200px;
		border-radius: 50%;
		overflow: hidden;
		margin-top: -150px;
		margin-left:-10px;
		float:left;
		}
		h4{
			  text-align: justify;
		  text-justify: inter-word;
			
		}
		.image{
		display:block;
		width:200px;
		height:300px;
	
}
.navbar{
	left:1px;
	width: 100%;
	height:45px;
}
	</style>
    
    
</head>

<body>
<!-- header -->
<div class="header">
  <h1>G&S ELECTRICALS</h1>
  
  <h>Water pump A boon for farmers</h><br>
  <div class="logo-image">
            <a href="home.php"><img src="image/logo2.png" class="img-fluid"/></a>
			
      </div>
  <p style="margin-left: 0px;"></p>
</div>

<!-- header ends -->
<!-- menubar -->
	<div class="navbar">
	<a href="home.php" class="active">Home</a>
	<?php
	$sql="SELECT * from prdttype";
	$data=mysqli_query($con,$sql);
	while($ress=mysqli_fetch_array($data))
	{?>
	  <a href="catview.php?am=<?php echo $ress['prd_id'];?>"><?php echo $ress['prd_name'];?></a>
	  <?php
	}
	?>
	<a href="login.php" class="right">Logout</a>
  <a href="contact.php" class="right">Contact</a>
  <a href="profile.php" class="right">Profile</a>
   <a href="shome.php" class="right">Service</a>
   <a href="my_cart.php" class="right">Cart</a>
   <a href="about.php" class="left">About</a>
	</div>
<!-- menubar ends -->

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Service</h2>
                </div>
				
				
                <div class="card-body">
                    
					<form action="service.php" method="post">
					<div class="form-row">
                            <div class="name">Owners Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" id="name" name="oname" required>
									  
                                </div>
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Contact No</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" id="name" name="ophn" required>
									  
                                </div>
                            </div>
                        </div>
						 <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" id="email" name="email" required>
									
                                </div>
                            </div>
                        </div>
						<div class="form-row">
						
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="input-group">
								<textarea name="oaddress" id="address" class="input--style-5" rows="4" cols="50" style="height:auto;border: none;" required></textarea>
                                    
									  
                                </div>
                            </div>
                        </div>
						
									
						
						<div class="form-row">
                            <div class="name">Motor-type</div>
                            <div class="value">
                                <div class="input-group">
                                    
								
								  <input class="input--style-5" type="text" id="mtype" name="mtype" value=""required>
								  
                                </div>
								
                            </div>
                        </div>
			
			
			
						<div class="form-row">
                            <div class="name">Motor Name</div>
                            <div class="value">
                                <div class="input-group">
                                   
								  <input class="input--style-5" type="text" id="mname" name="mname" value=""required>
								  
                                </div>
								
                            </div>
                        </div>
						<div class="form-row">
                            <div class="name">Year of Purchase</div>
                            <div class="value">
                                <div class="input-group">
                                   
								  <input class="input--style-5" type="text" id="pyear" name="pyear" value=""required>
								  
                                </div>
								
                            </div>
                        </div>
			
								
									 <div class="form-row">
                            <div class="name">Services</div>
                            <div class="value">
                                <div class="input-group">
                                    
									<select class="input--style-5" name="service" id="cars" style="height:40px; width:100%;border:none;">
									<option value="Bearing Frame And Foot">Bearing Frame And Foot</option>
									<option value="Shaft And Sleeve">Shaft And Sleeve</option>
									<option value="Bearing Housing">Bearing Housing</option>
									<option value="Shaft">Shaft</option>
								  </select>
                                </div>
								
                            </div>
                        </div>

<div>
					<center>
                    
					<button href="#" class="btn btn--radius-2 btn--green" style="text-decoration: none;" type="submit" name="ok" class="btn">Submit</button>	
					<a href="home.php" class="btn btn--radius-2 btn--green" style="text-decoration: none;">Back to Home</a>
					</center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</html>
