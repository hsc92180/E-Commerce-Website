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
 
 <br>
	</center>
 
 <br/><br/>
 <center>
 <label style="font-size:18px">
 <b>Order Details</b></label>
 <table class="table table-hover" style='width:70%'>
 <?php
  $sel="select * from recom";
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
	   <th>User Name</th>
        <th>Recommendations</th>
        <th>Date</th>
        <th>Time</th>
	  
      </tr>
    </thead>";
	 
	while($data=mysqli_fetch_array($rel))
		  {
			 
	$uid=$data['uid'];
	  $uname=$data['uname'];
	  $recom=$data['recomm'];
	  $date=$data['date'];
	  $time=$data['time'];
	   
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
	  <td>".$uid."</td>
        <td>".$uname."</td>
        <td>".$recom."</td>
		
		<td>".$date."</td>
		<td>".$time."</td>
		
      </tr>
      
    </tbody>";
		  }
		
  }
  