<?php
   session_start();
  include('connect.php');
  $subj = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ';
		 $_SESSION['uid']= $subj; 
 $uid= $_SESSION['uid'];
  $pid=$_GET['pid'];
  
  $subj1 = ! empty($_SESSION['name']) ? $_SESSION['name'] : ' ';
		 $_SESSION['name']= $subj1; 
$uname= $_SESSION['name'];
 

 
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
	Logo
</p>
    <p class="w3-right">
	<ul class="w3-right">
      <li class="w3-hide-small w3-dropdown-hover"><i class="fa fa-shopping-cart w3-margin-right">
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
 if($uname!=' ')
  {
	  echo "<h6>Hello $uname</h6>";
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
  </ul>
    </p>
	
  </header>
  
  
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
			 $price=$data['price'];
			 $nm1=$data['name'];
			   echo"
   
	<table width='70%' align='center' border='0'>
	<tr>
	<td width='15%'> <img src='images/".$data['img']."' style='width:60px';></td>
	<td width='25%'> ".$data['name']."</td>
	 <td width='15%'>Rs.".$data['price']."</td>
	  <td width='25%'><input class='w3-input w3-border' name='rate' type='text' placeholder='Enter Rate / 5'  title='Please Enter number between 1 to 5 Only' style='width:70%'></td>
</tr>
	 <tr>
	 <td colspan='4'>
	 <hr  style='align:center'></td>
	  </tr>
	 
	  
    ";
	
		  }
		   echo" <tr>
  <td colspan='5' align='center'>
  <button type='submit' name='proceed' class='w3-btn w3-padding w3-orange w3-margin-bottom'>Proceed to Payment</button>
  </td>
  </tr>";
  }
  
  ?>

</table> 
 </div>
 <center>
 <div class="w3-row-padding w3-padding-16 w3-center" style='display:none' id='payment'>

 <table width='70%' style='height:300px' align='center' border='0' bgcolor='black'>
    <tr align='center'>
	<td><h3>
	Payment Details</h3>
	</td>
	</tr>
	<tr align='center'>
	<td>
	<input class="w3-input w3-border" name='name' type="text" placeholder="Enter Name on Card" pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" style="width:60%">
	<br></td>
	</tr>
	<tr align='center'>
	<td>
	<input class="w3-input w3-border" name='card' type="text" placeholder="Enter Credit/Debit Card No" pattern="[0-9]{16}" title="Please Enter valid Credit card No" style="width:60%">
	<br></td>
	</tr>
	<tr align='center'>
	<td>
	<input class="w3-input w3-border" name='cvv' type="text" placeholder="Enter CVV No." pattern="[0-9]{3}" title="Enter 3 Digit CVV NO" style="width:60%">
	<br></td>
	</tr>
	<tr align='center'>
	<td>
	<?php
	
	echo " <h5>Total Amount: Rs. ".$price." </h5>";
	?><br></td>
	</tr>
	<tr align='center'>
	<td>
	 <button type='submit' name='done' class='w3-btn w3-padding w3-red w3-margin-bottom'>Done</button>
	<br></td>
	</tr>
	</table>
 </div>
 </center>
 <?php
	if(isset($_POST['proceed']))
	{
		$rate=$_POST['rate'];
		if(empty($rate))
		{
			 echo "<script>alert('Please Give Ratings to book..');</script>";
		}
		else
		{
		 
		$sel="select * from product where pid=$pid";
		  $rel=$con->query($sel);
	         while($row=mysqli_fetch_array($rel))
		  {
			  $book=$row['name'];
			  
		  }
		  $sql1="Insert into rating(uid,uname,pid,book,rate) values ('$uid','$uname','$pid','$book','$rate')";
          if(mysqli_query($con,$sql1))
		  {
			  
		  }  
		echo "<script>document.getElementById('payment').style.display='block';</script>";
		}
	}
		?>
 <?php
 if(isset($_POST['done']))
 {   
	 $name1=$_POST['name'];
	 $card1=$_POST['card'];
	 $cvv1=$_POST['cvv'];
	
	  date_default_timezone_set('Asia/Kolkata');
 
              $myDate = date('Y-m-d');
	  if(empty($name1)||empty($card1)||empty($cvv1))
	 {
		 echo "<script>alert(\"Fill all fields !!!\")</script>";
	 }
	 else
	 {
		 $sql="select oid from payment order by oid desc";
		 $rel=$con->query($sel);
	         if($row=mysqli_fetch_array($rel))
		  {
			  $oid=$row['oid'];
			  $oidd=$oid+1;
		  }
		  else
		  {
			  $oidd="101";
		  }
		 
		 
           $sql="Insert into payment(oid,uid,name,card,cvv,products,total,date) values ('$oidd','$uid','$name1','$card1','$cvv1','$nm1','$price','$myDate','Order Pending')";
         if(mysqli_query($con,$sql))
	  {
		  
		 echo "<script>alert(\"Payment Done!!!\")</script>";
	    echo "<script>location.replace('bookgallery.php')</script>" ;
		  }
     
	  else
	  {
		  echo "<script>alert(Please try again);</script>";
	  }
 }
 }
 ?>
 </form>
 <body>
 </html>
<footer class="w3-container w3-theme-d5" style='background-color:
#545454;width:100%'>
  <p align='right' style='color:white'> <a href="#" target="_blank">Online Book Shopping</a></p>
</footer>