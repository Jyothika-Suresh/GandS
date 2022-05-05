<?php
include 'dbcon.php';
?>

<!DOCTYPE html>
<html>
<title>admin dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="aregdtls.php" class="w3-bar-item w3-button">REGISTRATION DETAILS</a>
  <a href="#" class="w3-bar-item w3-button">FEATURED PRODUCTS DETAILS</a>
  <a href="#" class="w3-bar-item w3-button">ADD COMPANY</a>
</div
<!-- Page Content -->
<div style="margin-left:25%">
	<div class="w3-container w3-teal">
		<h1>My Page</h1>
	</div>	
	<div class="w3-container">
		<h2>Registeration Details</h2>
		<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
		<th>Country</th>
		<th>State</th>
		<th>Address</th>
        <th>Delete</th>
		<th>Edit</th>
    </tr>
 <?php
 $result=mysqli_query($con, "SELECT * FROM `reg`");
 while ($row=mysqli_fetch_array($result)){
	 //print_r($row);
 ?>   
 <tr>
     
    <td><?php echo $row["name"];?></td>
    <td><?php echo $row["email"];?></td>
    <td><?php echo $row["phone"];?></td>  
	<td><?php echo $row["country"];?></td>  
	<td><?php echo $row["state"];?></td>  
	<td><?php echo $row["address"];?></td>  
    <td><a href="delete.php?del=<?php echo $row["rid"];?>">Delete</td>
	<td><a href="edit.php?edit_id=<?php echo $row["rid"];?>">Edit</td>	 
 </tr>
 <?php
 }
 ?>

</table>
		
	</div>
</div>
</body>
</html>
