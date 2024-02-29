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
.w3-sidenav a {font-family: "Roboto", sans-serif}
body,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
h5,h1{font-family: "Montserrat", sans-serif;color:red}
</style>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="jquery.validate.min.js"></script>
  <script>
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#myForm").validate({
    
        // Specify the validation rules
        rules: {
				
				address: "required",
				user: "required",
				pass: "required",
				
				email: {
                required: true,
                email: true
				},
           name: {
                required: true,
              
				},
				mob:{
				required:true,
				minlength:8,
				maxlength:16,
				number: true
				},		
			},
		
        
        // Specify the validation error messages
        messages: {
            name: "<label><h5>Please enter your full name!</h5></label>",
            address:"<label><h5>Please enter Address!</h5></label>",
			email:"<label><h5>Please enter valid email Address!</h5></label>",
			mob:"<label><h5>Please enter Valid Contact No!</h5></label>",
			
			user: "<label><h5>Please enter valid Username!</h5></label>",
			pass: "<label><h5>Please enter valid Password!</h5></label>",
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>


<form method="post" id='myForm'  novalidate="novalidate">
<center>
<br><br>
 <div class="w3-container w3-black w3-padding-32" id='login' style='width:70%;align:center'>
  <center>
    <h1>Register</h1>
    <p>New Customer first register with valid details.</p>
	 <p><input class="w3-input w3-border" type="text" name='name' placeholder="Enter Full name"  title="Please Enter Characters Only" style="width:40%"></p>
	<p><input class="w3-input w3-border" type="text" name='mob' placeholder="Enter Mobile No." style="width:40%"></p>
	<p><input class="w3-input w3-border" type="text" name='email' placeholder="Enter e-mail" style="width:40%"></p>
    <p><input class="w3-input w3-border" type="text" name='address' placeholder="Enter Address" style="width:40%;height:60px"></p>
	<p><input class="w3-input w3-border" type="text" name='user' placeholder="Enter Username" style="width:40%"></p>
	<p><input class="w3-input w3-border" type="password" name='pass' placeholder="Enter Password" style="width:40%"></p>
    <button type="submit" class="w3-btn w3-padding w3-red w3-margin-bottom" name='reg'>Register</button>
	<br>
	</center>
  </div>
  </center>
  <?php
  if(isset($_POST['reg']))
  {
	  include('connect.php');
	
	   $var="select max(uid) as max from user";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
	
	     $uid = $row['max'] + 1;
		
		
	$name=$_POST['name'];
	
	
    $mob=$_POST['mob'];
	
	
    $email=$_POST['email'];
	
	
    $address=$_POST['address'];
	
	
    $user=$_POST['user'];
	
	
    $pass=$_POST['pass'];	
	
	
	$stmt="Insert into user values ('$uid','$name','$mob','$email','$address','$user','$pass')";
	if(mysqli_query($con,$stmt))
	  {
		echo "<script>alert('Register successfully');</script>";
		echo "<script>location.replace('bookgallery.php');</script>";

        }
  }

  ?>
  </form>