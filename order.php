<?php
   session_start();
  include('connect.php');
  $subj = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ';
		 $_SESSION['uid']= $subj; 
 $uid= $_SESSION['uid'];
  
  
  $subj1 = ! empty($_SESSION['name']) ? $_SESSION['name'] : ' ';
		 $_SESSION['name']= $subj1; 
 $uname1= $_SESSION['name'];
 
?>
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
body,h1,h2,h4,h6,.w3-wide {font-family: "Montserrat", sans-serif;color:black;}
h5,h3{font-family: "Montserrat", sans-serif;color:white;}
</style>

<body class="w3-content" style="max-width:1300px" >
<form method='post'>

 <header class="w3-container w3-xlarge">
    <p class="w3-left">
	<a href='home.php'>Logo</a>
</p>
    <p class="w3-right">
	<ul class="w3-right">
      <li class="w3-hide-small w3-dropdown-hover w3-white"><i class="fa fa-shopping-cart w3-margin-right">
	 <span class="w3-badge w3-right w3-small w3-red">
	 <?php
	 $no="select count(pid) as number from temp where uid='$uid'";
	$num=$con->query($no);
	$rows=$num->fetch_assoc();
	echo $rows['number'];
	 ?>
	 </span></i></li>
	 <li class="w3-hide-small w3-dropdown-hover">
	  <?php
 if($uname1!=' ')
  {
	  echo "<h6>Hello $uname1</h6>";
  }
	  ?>
    <a href="#" class="w3-padding-large " title="Notifications"><i class="fa fa-user"></i></a>     
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
  
  
  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <?php
  $sel="select * from payment where uid='$uid'";
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  echo "<center><h2>Order Details</h2></center>";
	  while($data=mysqli_fetch_array($rel))
		  {
			 
			   echo"
   
   <br>
	<table width='60%' align='center' border='0'>
	<tr align='center'>
	<td width='10%'>".$data['date']."</td>
	<td width='25%'> ".$data['products']."</td>
	 <td width='15%'>Rs.".$data['total']."</td></tr>
	 <tr>
	 <td colspan='3'>
	 <hr  style='align:center'></td>
	  </tr>
	 
	  
    ";
	
		  }
		   
  }
  
  ?>

</table> 
 </div>
 
 </form>
 <body>
 </html>
 <br><br><br><br><br><br>
<footer class="w3-container w3-theme-d5" style='background-color:
#545454;width:100%'>
  <p align='right' style='color:white'> <a href="#" target="_blank">Online Book Shopping</a></p>
</footer>