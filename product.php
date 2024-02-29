<?php
  session_start();
  include('connect.php');

  $pid=$_GET['pid'];

  $subj = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ';
		 $_SESSION['uid']= $subj; 
 $uid= $_SESSION['uid'];
 

 $subj1 = ! empty($_SESSION['name']) ? $_SESSION['name'] : ' ';
		 $_SESSION['name']= $subj1; 
 $uname1= $_SESSION['name'];
 
?>
<html>
<title>Online Book Shopping</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidenav a {font-family: "Roboto", sans-serif}
body,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;color:black;}
.pagination {
  
    padding-left: 20px;
    margin-bottom: 20px;
}
.page {
    display: inline-block;
    padding: 10px 15px;
    margin-right: 4px;
    border-radius: 13px;
    border: solid 1px #c0c0c0;
    background: #e9e9e9;
    box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
    font-size: .875em;
    font-weight: bold;
    text-decoration: none;
    color: blue;
    text-shadow: 0px 1px 0px rgba(255,255,255, 1);
}

.page:hover, .page.gradient:hover {
    background: #fefefe;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
    background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
}

.page.active {
    border: none;
    background: #616161;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .8);
    color: #f0f0f0;
    text-shadow: 0px 0px 3px rgba(0,0,0, .5);
}

.page.gradient {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f8f8f8), to(#e9e9e9));
    background: -moz-linear-gradient(0% 0% 270deg,#f8f8f8, #e9e9e9);
}

</style>
<body class="w3-content" style="max-width:1300px" >
<form method='post'>
<!-- Sidenav/menu -->
  




<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-black w3-xlarge w3-padding-24">
  <span class="w3-left w3-wide">LOGO</span>
  <a href="javascript:void(0)" class="w3-right w3-opennav" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" >

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
  
    <p class="w3-left">
   
</p>
    <p class="w3-right">
	<ul class="w3-right">
      <li class="w3-hide-small w3-dropdown-hover w3-white"><a href='payment.php'><i class="fa fa-shopping-cart w3-margin-right">
	 <span class="w3-badge w3-right w3-small w3-red">
	 <?php
 $no="select count(pid) as number from temp where uid='$uid'";
	$num=$con->query($no);
	$rows=$num->fetch_assoc();
	echo $rows['number'];
	 ?>
	 </span></i><a></li>
	 <li class="w3-hide-small w3-dropdown-hover">
	  
	  <?php
  if($uname1!=' ')
  {
	  echo "<h6>Hello $uname1</h6>";
  }
	  ?>
    <a href="#" class="w3-padding-large " title="my account"><i class="fa fa-user"></i></a>     
    <div class="w3-dropdown-content w3-white w3-card-4" style='font-size:12px'>
      <a href="#login">Login</a>
	   <?php
	  if($uid!=' ')
	  {
		  echo "<a href='order.php'>My Orders</a>";
	  }
	  ?>
      <a href="Logout.php">Logout</a>
     
    </div>
	
  </li>
  <a href='bookgallery.php'><img src='images/cross.jpg' width='30px'></a>
  </ul>
 
    </p>
	
  </header>

  <!-- Image header -->
 
  <!-- Product grid -->
  

  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <?php

  $sel="select * from product where pid='$pid'";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  while($data=mysqli_fetch_array($rel))
		  {
			  $name=$data['name'];
			  $price=$data['price'];
			  echo"
    <div class='w3-half'>
      <img src='images/".$data['img']."' style='width:70%';>
     
    </div>
	 <div class='w3-half' style='text-align:left'>
	 <br><br>
	<p><h2>".$data['name']."</h2><hr>
	Price: <b>Rs. ".$data['price']."</b><br><br>
	".$data['description']."
	</p>
	<br>
	<button type='submit' name='cart' class='w3-btn w3-padding w3-orange w3-margin-bottom'>Add to Cart</button>
	&nbsp;
	<button type='submit' name='buy' class='w3-btn w3-padding w3-orange w3-margin-bottom'>Buy Now</button>
	 </div>
   ";
		  }
		  
  }

  ?>
   </div>
   <center>
  </div>
							
							   <br><br>
  <!-- Login section -->
  
   <?php
  $ee=! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ';
  if($ee==' ')
  {
	  ?>
  <div class="w3-container w3-black w3-padding-32" id='login' style='width:100%'>
  <center>
    <h1>Sign In</h1>
    <p>Login to your account with valid email id and password</p>
    <p><input class="w3-input w3-border" name='uname' type="text" placeholder="Enter Username" style="width:40%"></p>
	<p><input class="w3-input w3-border" name='password' type="password" placeholder="Enter Password" style="width:40%"></p>
    <button type="submit" name='login' class="w3-btn w3-padding w3-red w3-margin-bottom">Login</button>
	<br>
	New Customer?<br><br>
	 <a href='reg.php'><button type="button" class="w3-btn w3-padding w3-orange w3-margin-bottom">Register here</button></a>
    </center>
  </div>
  <?php  }  ?>
  
  <!-- Footer -->
  
 
  <!-- End page content -->
<?php

if(isset($_POST['cart']))
{
		if($uid==' ')
	{
	 echo"<script>window.location.href='#login'</script>";
	}
	else
	{
    
	$uid=$_SESSION['uid'];

	//$l=$_POST["id4"];
	$sql="insert into temp values('$uid','$pid','$name','$price')";
	if (mysqli_query($con, $sql)) 
       {
          echo "<script>alert('Item added to cart successfully..');</script>";
		  echo "<script>location.replace('product.php?pid=".$pid."');</script>";
       } 
	   else 
       {
   
       }
	}
	}
	
	if(isset($_POST['buy']))
{
		if($uid==' ')
	{
         
	 echo"<script>window.location.href='#login'</script>";
	 $_SESSION['bn']='abc';	
	$bn=$_SESSION['bn'];
	}
	else
	{
    
	$uid=$_SESSION['uid'];

	
		  echo "<script>location.replace('buynow.php?pid=".$pid."');</script>";
       
	}
	}
	
	
	if(isset($_POST['login']))
{
       $uname=$_POST['uname'];
	   $pass=$_POST['password'];
	  
				 
	  if(empty($uname)||empty($pass))
	 {
		 echo "<script>alert('Please Fill Username and password fields');</script>";
	 }
	 else{
	   $sel="select username,password,uid,name from user where username='$uname' and password='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))
				{
					$sub = ! empty($_SESSION['bn']) ? $_SESSION['bn'] : ' ';
		             $_SESSION['bn']= $sub; 
                   $bn=$_SESSION['bn'];
		           $_SESSION['uid']=$row['uid'];
				   $uid= $_SESSION['uid'];
                   
				   $_SESSION['name']=$row['name'];
				   $uname= $_SESSION['name'];
				   if($bn=='abc')
				   {
					    echo "<script>location.replace('buynow.php?pid=".$pid."');</script>";
				   }
				   else
				   {
				   $sql="select * from product where pid=".$pid;
                   $result = $con->query($sql);
                   $row = $result->fetch_assoc();
				    $name=$row['name'];
					$cost=$row['price'];
					
					$sql1="insert into temp(uid,pid,name,price) values('$uid','$pid','$name','$cost')";
	if (mysqli_query($con, $sql1)) 
       {
         echo "<script>alert('Item added to cart successfully..');</script>";
		 echo "<script>location.replace('product.php?pid=".$pid."');</script>";
       } 
	  
}

   }
   else
   {
	   echo "<script>alert('Invalid username or password');</script>";
   }
}
}
?>

</form>
</body>
</html>
<br>
<footer class="w3-container w3-theme-d5" style='background-color:
#545454;width:100%'>
  <p align='right' style='color:white'> <a href="#" target="_blank">Online Book Shopping</a></p>
</footer>

