<?php
include('dbcon.php');
session_start();

        if(isset($_POST['btn']))
        {
            $username=$_POST["un"];
            $password=$_POST["pas"];
            $password= md5($password);
                $query = "SELECT * FROM `reg` WHERE email='$username' AND pass='$password' ";
                $res=mysqli_query($con,$query);
    if($data5 = mysqli_fetch_assoc($res))
    {
    if(mysqli_num_rows($res)>0)
{
        $rid = $data5['rid'];
        echo $rid;
        $result = "SELECT * FROM `login` WHERE `rid`='$rid' ";
        
        $res1=mysqli_query($con,$result);
     
        if($data1 = mysqli_fetch_assoc($res1))
    { 
        $tid = $data1['type_id'];
                        
            
             if($tid==1)
                       {
                           header('location:aregdtls.php');
                       }
                       
                       elseif($tid==2)
                       {
                           $_SESSION['email']=$username;
                           header('location:home.php');
                       }
                       elseif($tid==3)
                       {
                           $_SESSION['email']=$username;
                           header('location:staff.php');
                       }
                }
                    
                                    }  
                                     else
                     {
                       echo '<script type="text/javascript"> alert("invalid user name or password!!")</script>';
                                      }
                                    }
                                    
                                } 
								
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
  </head>
  <body>
    <form class="login-form" action="#" method="post">

      <!-- form header -->
      <div class="form-header">
        <h1>LOGIN</h1>
      </div>

      <!-- form body -->
      <div class="form-body">

        <!-- Name -->
        <div class="form-group">
          <div class="form-group left">
            <label for="un" class="label-title">Email *</label>
            <input type="text" name="un" id="email" class="form-input" placeholder="enter your email" required="required" />
          </div>       
        </div>

        <!-- Passwrod -->
       
          <div class="form-group">
            <label for="password" class="label-title">Password *</label>
            <input type="password" name="pas" id="password" class="form-input" placeholder="enter your password" required="required">
          </div>

      <!-- form-footer -->
      <div class="form-footer">
        <button type="submit" name="btn" class="btn">LOGIN</button>
		
		<a href="reg.php"><input type="button" name="btn2" class="btn" value="REGISTER"></a>
		<!--<br><a href="reset.php" class="label-title"><font size="4.5">Forgot Password</font></a>-->
      </div>

    </form>

  </body>
</html>
<script type= "text/javascript" >
   function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null }; 
</script>