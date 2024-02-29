<!DOCTYPE html>
<html>
<title>Online Book Shopping</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
include('adminMenu.php');
 include("connect.php");
 ?>
 
 <br/><br/><br/><br/>
 <center>
 <table class="table table-hover" style='width:70%'>
 <?php
  $sel="select * from user";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {

	  
	  
	  echo "
    <thead bgcolor='#424146' style='color:white'>
      <tr>
	   <th>User Id</th>
        <th>Name</th>
        <th>Contact No</th>
        <th>Email Id</th>
		<th>Address</th>
	   
      </tr>
    </thead>";
	
	while($data=mysqli_fetch_array($rel))
		  {
			
	 
	  $uid=$data['uid'];
	  $name=$data['name'];
	  $mob=$data['contact'];
	  $email=$data['email'];
	  $add=$data['address'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
        <td>".$uid."</td>
        <td>".$name."</td>
        <td>".$mob."</td>
		<td>".$email."</td>
		<td>".$add."</td>
      </tr>
      
    </tbody>";
		  }
		
  }
  ?>
 </table></center>
 