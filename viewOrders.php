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
 <?php
	$idd= ! empty($_GET['id']) ? $_GET['id'] : ''; 
	$sel="select * from payment where oid='$idd'";
    $rel=$con->query($sel);
    if($data=mysqli_fetch_array($rel))
		  {
			  $nm=$data['name'];
  ?>
  
   
	<form method="post">
	<center><br/><br/><br/>
	<table border='0'>
	<tr><td><br/><label>Status</label><br></td><td><br>
	<select name="status">
	<option>--Select--</option>	
	<option>Order Placed</option>	
	<option>Processing</option>	
	<option>In Delivery</option>	
	<option>Delivered</option>	
	</select>
	</td></tr>

	<tr><td colspan="2" align='center'><br/>
    <button type="submit" class="w3-btn w3-padding w3-red w3-margin-bottom" name='update'>Update</button>
	
	</td></tr>
	</table></center></form>
	<?php
		  }
		  ?>
	<br>
	</center>
 
 <br/><br/>
 <center>
 <label style="font-size:18px">
 <b>Order Details</b></label>
 <table class="table table-hover" style='width:70%'>
 <?php
  $sel="select * from payment";
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
	   <th>Status</th>
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
		$status=$data['status'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
	  <td>".$oid."</td>
        <td>".$uid."</td>
        <td>".$name."</td>
		<td>".$prod."</td>
		<td>".$tot."</td>
		<td>".$date."</td>
		<td>".$status."</td>
		<td><a href='viewOrders.php?id=$oid'>Edit</a></td>
      </tr>
      
    </tbody>";
		  }
		
  }
  
  if(isset($_POST['update']))
  {
	  $status=$_POST['status'];
	  
	  $upd="update payment set status='$status' where oid='$idd'";
	  if(mysqli_query($con,$upd))
	  {
		  echo "<script>alert('Updated');</script>";
		  echo "<script>window.location.href='viewOrders.php';</script>";
	  }
	  else
	  {
		  echo "<script>alert('Updation Failed');</script>";
	  }
  }
  ?>
 </table></center>