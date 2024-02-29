<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css"> 
<head>
  
  <title>Customer Targeted E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="style1.css"> 

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<form method='post'>


	<?php
	//include('homeMenu.php');
	include("connect.php");
	 
	if(isset($_POST['adminlogin']))
	{
		 $uname=$_POST['auname'];
		   $pass=$_POST['apass'];
		   if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill id and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from admin where id='$uname' and pass='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['aid']=$row['id'];
					$aid= $_SESSION['aid'];
					$_SESSION['type']="admin";
					echo "<script>window.location.href='prodEntry.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
		
	}
	

	
		
	
	
	?>
<div class="container-fluid bg-1 text-center" style='height:435px;background-color:black'>
<br><br><br><br>
  <img src="images/logo.jpg" class="img-responsive img-circle margin" style="display:inline;height:300px" width="550" >
<h4 style='color:white'>Customer Targeted E-Commerce</h4><br><br>
  </div>




  
  
  <div id="admin" class="container">
  <h3 class="text-center">ADMIN LOGIN</h3>
  <p class="text-center">Admin can Login into the system<br> for performing various important task.</p>
<center> 
 <div class="row text-left" style='width:40%'>      
	  <label class='text-left'>Username</label><br>
      <input type='text' class='form-control' placeholder="Enter username" name='auname'><br>
      <label for="lname">Password</label>
      <input type='password' class='form-control' placeholder="Enter password" name='apass'><br><br>
      <input type='submit' class="btn pull" value="Login" name='adminlogin' OnClick="Button1_Click" />
      <input type='reset' class="btn pull" value="Reset"  />
</div>
   </center> 
    
  </div>

<!-- Footer -->
<footer class="text-center">
  <p align='right'><a href="#" data-toggle="tooltip" title="">Customer Targeted E-Commerce</a></p> 
</footer>

</form>
</body>
</html>