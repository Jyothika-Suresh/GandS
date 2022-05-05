
<?php

if(isset($_POST['btn']))
{
include 'dbcon.php';
    $username=$_POST['un'];	
	$password=$_POST['pas'];
	$cpas=$_POST['cpass'];
	$password= md5($password);
	$query="UPDATE `reg` SET `pass`='$password' where `email`='$username'";
 $query_run = mysqli_query($con,$query);
 
 if(mysqli_query($con,$query))
	{
			echo "Password updated successfully";
		}
		else  
		{
			echo mysqli_errno($con);
		}
 }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Staff Reset Password</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
  </head>
  <body>
    <form class="login-form" action="staff.php" method="post">

      <!-- form header -->
      <div class="form-header">
        <h1>Reset Password</h1>
      </div>

      <!-- form body -->
      <div class="form-body">

        <!-- Name -->
        <div class="form-group">
          <div class="form-group left">
            <label for="un" class="label-title">Name *</label>
            <input type="text" name="un" id="email" class="form-input" placeholder="Enter Email" required="required" />
          </div>       
        </div>

        <!-- Passwrod -->
       
          <div class="form-group">
            <label for="password" class="label-title">Password *</label>
            <input type="password" name="pas" id="password" class="form-input" placeholder="Enter New Password" required="required">
          </div>
		 <!-- Conf Passwrod -->
		 
		  <div class="form-group right">
            <label for="pass2" class="label-title">Confirm Password *</label>
            <input type="password" name="cpass" class="form-input" id="pass2" placeholder="Confirm Password" required="required">
		  </div>

      <!-- form-footer -->
      <div class="form-footer">
        <button type="submit" name="btn" class="btn">RESET</button>			
		<a href="login.php"><input type="button" name="btn2" class="btn" value="GO TO LOGIN"></a>
      </div>

    </form>
  </body>
</html>