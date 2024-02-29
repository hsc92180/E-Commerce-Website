<!DOCTYPE html>
<html>
<title>Online Book Shopping</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
#text
{
	color:black;
}

</style>

<body class="w3-content" style="max-width:1500px">
<?php include('adminMenu.php');
include("connect.php");

 $var="select max(pid) as max from product";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	     $pid = $row['max'] + 1;
 ?>

<form method="post" id='myForm'  enctype="multipart/form-data">
<center>
<br><br><br/><br/>
 <div class="w3-container w3-black w3-padding-32" id='login' style='width:70%;align:center' style="background-color:green">
  <center>
    <h1>Add Quetion Keywords</h1>
    <p>You can add Keywords here!</p>
	<table border='0'>
	<tr><td><label>Product Name</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" name='name' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	 
	<tr><td><label>Keyword</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" name='key' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	
	
	<tr><td><label>Answer</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" name='ans' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	
	
	<tr><td colspan="2" align='center'>
    <button type="submit" class="w3-btn w3-padding w3-red w3-margin-bottom" name='reg'>Submit</button>
	</td></tr>
	</table>
	
	<br>
	</center>
  </div>
  </center>
  
  <?php
  include('connect.php');
  if(isset($_POST['reg']))
  {
	 $name=$_POST['name'];
	 $key=$_POST['key'];
	 $ans=$_POST['ans'];
	  $sql="Insert into question values('$name','$key','$ans')";
			if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Book Details submitted succesfully');</script>";
	  }
	  else
	  {
		  echo "<script>alert('Existing Book Id..Please try again');</script>";
	  }
  }
  
  ?>
  <br/><br/><br/><br/><br/>
  <footer class="w3-container w3-theme-d5" style='background-color:
#FA8072;width:100%'>
  <p align='right' style='color:white'> <a href="#" target="_blank">Online Book Shopping</a></p>
</footer>