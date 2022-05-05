<?php
include 'dbcon.php';
if (isset($_POST["btn"])){
    $name=$_POST["uname"];
    //echo $name;
	$email=$_POST["email"];
	//echo $email;
	$mobile=$_POST["phn"];
    //echo $mobile;
	$pass=md5($_POST["pass"]);
	//echo $pass;
	$cnt=$_POST["country"];
	//echo $cnt;
	$state=$_POST["state"];
	//echo $state;
    $address=$_POST["address"];
    //echo $address;

    $sql="INSERT INTO `reg`(`name`, `email`, `phone`, `country`, `state`, `address`, `pass`, `status`) VALUES ('$name','$email','$mobile','$cnt','$state','$address','$pass',0)";
    //header("location:view.php");
	
	if(mysqli_query($con,$sql))
      {  
        $sql1="SELECT * from `reg` WHERE `email`='$email'";
        $data = mysqli_query($con,$sql1);
        if($res=mysqli_fetch_assoc($data)){
          $sql2="SELECT * from `usertype` WHERE `type_name`='user'";
          $data1 = mysqli_query($con,$sql2);
          if($row=mysqli_fetch_assoc($data1)){
            $r = $res['rid'];
            $t = $row['type_id'];

            $sql3 = "INSERT INTO `login` (`rid`,`type_id`) VALUES ('$r','$t')";
            if(mysqli_query($con,$sql3))
            {
              echo"registered successfully";
              header('location:login.php');
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
<html>
  <head>
    <meta charset="utf-8">
    <title>Register Form</title>
	<script type= "text/javascript" src = "countries.js"></script>
    <link rel="stylesheet" type="text/css" href="css/register.css">
  </head>
  <body>
    <form class="signup-form" action="#" method="post">

      <!-- form header -->
      <div class="form-header">
        <h1>Create Account</h1>
      </div>

      <!-- form body -->
      <div class="form-body">

        <!-- Name -->
        <div class="form-group">
          <div class="form-group left">
            <label for="name" class="label-title">Name *</label>
            <input type="text" name="uname" id="name" class="form-input" placeholder="enter your name" required="required" />
            <span style="color: red; margin-left:10px;"></span>
		  </div>       
        </div>

        <!-- Email -->
        <div class="form-group">
          <label for="email" class="label-title">Email*</label>
          <input type="email" name="email" id="email" class="form-input" placeholder="enter your email" required="required">
          <span style="color: red; margin-left:10px;"></span>
		</div>
		<!-- Phnone number -->
        <div class="form-group">
          <div class="form-group left">
            <label for="phone" class="label-title">Mobile Number *</label>
            <input type="text" name="phn" id="phone" class="form-input" placeholder="enter your phone number" required="required" />
            <span style="color: red; margin-left:10px;"></span>
		  </div>       
        </div>

        <!-- Passwrod and confirm password -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label for="pass1" class="label-title">Password *</label>
            <input type="password" name="pass" id="pass1" class="form-input" placeholder="enter your password" required="required">
          </div>
          <div class="form-group right">
            <label for="pass2" class="label-title">Confirm Password *</label>
            <input type="password" name="cpass" class="form-input" id="pass2" placeholder="enter your password again" required="required">
            <span style="color: red; margin-left:10px;"></span>
		  </div>
        </div>

        <!-- cntry -->
        <div class="horizontal-group">
          <div class="form-group left">
            <label class="label-title">Country</label>
				 <select onchange="print_state('state',this.selectedIndex);" id="country" class="form-input" name ="country"></select>
				 <br />
          </div>
          <div class="form-group right">
            <label class="label-title">State</label>
				<select name ="state" id ="state" class="form-input"></select>
				<script language="javascript">print_country("country");</script>
				  
          </div>
        </div>

        <!-- address -->
        <div class="form-group">
           <label for="address" class="label-title">Address </label>
          <textarea name="address" id="address" class="form-input" rows="4" cols="50" style="height:auto"></textarea>
        </div>
      </div>

      <!-- form-footer -->
      <div class="form-footer">
        <center><button type="submit" name="btn" class="btn">Create</button></center>
		<br><span>Already have an account!</span>
		<a href="login.php"><input type="button" name="btn2" class="btn" value="Login"></a>
		<br><span><font color="white">* required</font></span>
      </div>
	  <div>
	  </div>

    </form>
	
	
	<script type="text/javascript">
function validate()
{  
 
if(document.getElementById('name').value.length==0 || 
document.getElementById('email').value.length==0 || 
document.getElementById('phone').value.length==0 ||
document.getElementById('pass1').value.length==0 || 
document.getElementById('pass2').value.length==0)
{
span[4].innerText = "Complete the registration";
  span[4].style.color = 'red';
return false;
}

}
  let name = document.getElementById('name');
  let span = document.getElementsByTagName('span');
  let email = document.getElementById('email');
  let phn = document.getElementById('phone');
  let pass1 = document.getElementById('pass1');
  let pass2 = document.getElementById('pass2');
  name.onkeyup = function()
  {
  var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
  if(regex.test(name.value))
  {
  span[0].innerText = "";
  span[0].style.color = '#28fc7a';
  

  }
  else
  {
  span[0].innerText = "enter a valid name";
  span[0].style.color = 'red';
  

  }
  }
 
  email.onkeyup = function(){
  const regex = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){1,3}$/;
  const regexo = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z0-9]+)\.([a-zA-Z0-9]){0,10}\.[a-zA-Z0-9]{1,3}$/;
  if(regex.test(email.value) || regexo.test(email.value))
  {
  span[1].innerText = "";
  span[1].style.color = '#28fc7a';
  }
  else
  {
  span[1].innerText = "your email is invalid";
  span[1].style.color = 'red';
  }
 }
 phn.onkeyup = function(){
   const regexn = /^[0-9]{10}$/;
   if(regexn.test(phn.value))
  {
  span[2].innerText = "";
  span[2].style.color = '#28fc7a';
  }
  else
  {
  span[2].innerText = "your number is invalid";
  span[2].style.color = 'red';
  }
  }
   pass2.onkeyup = function(){
   if (document.getElementById('pass1').value==document.getElementById('pass2').value)
   
  {
  span[3].innerText = "";
  span[3].style.color = '#28fc7a';
  }
  else
  {
  span[3].innerText = "password doesn't match";
  span[3].style.color = 'red';
  }
  }
 </script>

  </body>
</html>