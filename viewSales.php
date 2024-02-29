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
 <form method="post">
 <label style="font-size:18px">
 <b>Sales Details</b></label>
 <table>
 <tr><td>
 <label>Start Date</label><br/><br/></td>
 
 <td><input type="date" name="stdate"><br/><br/></td></tr>

  <tr><td>
 <label>End Date</label></td>
 
 <td><input type="date" name="enddate"></td></tr>
 
 <tr><td colspan="2" align="center"> <br/><input type="submit" name="s1" value="View" class="w3-btn w3-padding w3-red w3-margin-bottom"><br/><br/></td></tr>
</table>
</form>
 
 <table class="table table-hover" style='width:70%'>
 <?php
  $sel="select * from payment";
  if(isset($_POST['s1']))
  {
	  $sdate=$_POST['stdate'];
	  $end=$_POST['enddate'];
	  $sel="select * from payment where date between '$sdate' and '$end'";
  }
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
	  <th>Order Id</th>
	   <th>User Id</th>
        <th>Name</th>
        <th>Products</th>
        <th>Total</th>
	   <th>Date</th>
	   <th>Action</th>
      </tr>
    </thead>";
	 
	while($data=mysqli_fetch_array($rel))
		  {
			 
	$oid=$data['oid'];
	  $uid=$data['uid'];
	  $name=$data['name'];
	  $prod=$data['products'];
	  $tot=$data['total'];
	    $date=$data['date'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
	  <td>".$oid."</td>
        <td>".$uid."</td>
        <td>".$name."</td>
		<td>".$prod."</td>
		<td>".$tot."</td>
		<td>".$date."</td>
		<td><a href='viewOrders.php?id=$oid'>Edit</a></td>
      </tr>
      
    </tbody>";
		  }
		
  }