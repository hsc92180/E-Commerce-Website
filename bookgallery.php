<?php
session_start();
 $subj = ! empty($_SESSION['uid']) ? $_SESSION['uid'] : ' ';
		 $_SESSION['uid']= $subj; 
 $uid= $_SESSION['uid'];

 $subj1 = ! empty($_SESSION['name']) ? $_SESSION['name'] : ' ';
		 $_SESSION['name']= $subj1; 
$uname1= $_SESSION['name'];

  include('connect.php');
?>
<html>
<title>Online Book Shopping</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//responsivevoice.org/responsivevoice/responsivevoice.js"></script>

<script>
function sub1()
{
	var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  
 var pid=document.getElementById("catg").value;
   xhttp.open("GET", "sub.php?catg="+pid, true);
  xhttp.send();
}
</script>

<script>
responsiveVoice.OnVoiceReady = function() {
  console.log("speech time?");
  responsiveVoice.speak($('#text').val());
};
</script>

<style>
.w3-sidenav a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;color:white;}
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
<body class="w3-content" style="max-width:1200px" bgcolor='black'>
<form method='post'>
<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-top" style="z-index:3;width:250px;background-color:black" id="mySidenav">
  <div class="w3-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-closebtn w3-hover-text-red"></i>
    <a href='logo.php'><h3 class="w3-wide"><b>LOGO</b></h3></a>
  </div>
    
	Category
	<select name="catg" id="catg" onchange="sub1()">
	<option>--Select--</option>
	<?php 
	$sel="select distinct catg from product";
	$rel=$con->query($sel);

 while($data1=mysqli_fetch_array($rel))
 {
	echo "<option>".$data1['catg']."</option>";
 }	
	?>
	</select>
	
	<br/><br/>
	<div id="txtHint">
	
	</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="srch" class="w3-btn w3-padding w3-red w3-margin-bottom">
	
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold;border:0px solid white">
  <hr>
  <button type="submit" class="w3-btn w3-padding w3-red w3-margin-bottom" name='Recommendations' style="width:230px" >Recommendations</button><br>
<?php
require_once("recommend.php");
require_once("test.php");

if($uname1!=' ')
{
$re = new Recommend();

$i=0;
$str="";
foreach ($re->getRecommendations($ArraY, "$uname1") as $key => $value) {
echo "<table border='0' width='90%'>
<tr align='center'><td width='30%' align='center'>";

$sel="select * from product where name='$key' LIMIT 3";
$rel=$con->query($sel);
$i=0;
$date=date("Y-m-d");
$time=date("h:i:sa");

 while($data=mysqli_fetch_array($rel))
		  {
			  if($i==3)
			  {
				  break;
			  }
			  else
			  {
				  
				  $str.=$key.", ";
 
				echo "<a href='product.php?pid=".$data['pid']."' title='view more'><img src='images/".$data['img']."' width='50px'></a></td>";
				echo "<td width='60%' align='center'>".$key."<br>";
				$i=$i+1;
			  }
		  }
		  
		 

echo"
</td>";
  
echo"</td>";

echo "</tr></table><br>";
}
 if(empty($_SESSION['flag']))
				  {
					   $uuid=$_SESSION['uid'];
				  $uuname=$_SESSION['name'];
				 $sss="insert into recom values('$uuid','$uuname','$str','$date','$time')";
				  if(mysqli_query($con,$sss))
				  {
					  //echo "<script>alert('Product Details submitted succesfully');</script>";
					
				  }
				  else
				  {
					 // echo "<script>alert('Existing Product Id..Please try again');</script>";
				  }
				
				  $_SESSION['flag']=1;
				  }


echo "<form method='post'><table border='0' width='90%'>
<tr align='center'><td width='30%' align='center'><hr><br/>
<label>ASK QUERIES HERE</label><br/><br/>";?>
 <input type='text' name='query' ID='TextBox8' class='form-control' style='width:200px' size='50' placeholder='Enter query' value="<?php if (isset($_POST['query'])) { echo $_POST['query']; }  ?>" ><br><br>
                    
					<button type='submit' name='sub' id="gspeech" class="w3-btn w3-padding w3-red w3-margin-bottom" onClick='disab()' >Submit</button><br/>
	
	<hr></td></tr></table></form>
<?php


if(isset($_POST['sub']))
	{
		$query=$_POST['query'];
		
		$sqll="select name,free,warranty,delivery,features from product";
		$res=$con->query($sqll);
		$ansr="";
			 while($row=mysqli_fetch_array($res))
					  {			
							$pnm=$row['name'];
							$free=$row['free'];
							$warranty=$row['warranty'];
							$del=$row['delivery'];
							$features=$row['features'];
							
								if (strpos($query,$pnm) !== false )
								{
									if(strpos($query,"free") !== false || strpos($query,"discount") !== false)
									$ansr.=$row['free']." ";
								
									if(strpos($query,'warranty') !== false)
										$ansr.=$row['warranty']." ";
									
									if(strpos($query,'delivery') !== false)
										$ansr.=$row['delivery']." ";
									
									if(strpos($query,'features') !== false)
										$ansr.=$row['features']." ";
									break;
								}
								else
								{
									if(!isset($_POST['srch']))
									$ansr="No answer found";
								}
								
								
					  }
					  
					  echo "<tr><td><input type='text' name='text' id='text' value='".$ansr."' ReadOnly='True'>
					  </td></tr></table>";
	}

}
else
{
	
}
    	
?>
  </div>


</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-black w3-xlarge w3-padding-24">
  <span class="w3-left w3-wide">LOGO</span>
  <a href="javascript:void(0)" class="w3-right w3-opennav" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">
	
    <p class="w3-right"> 
	<ul class="w3-right">
      <li href='payment.php' class="w3-hide-small w3-dropdown-hover w3-black">
	 <a href='payment.php'>
	  <i class="fa fa-shopping-cart w3-margin-right">
	
	  <span class="w3-badge w3-right w3-small w3-red">
	    
	  <?php
	 $no="select count(pid) as number from temp where uid='$uid'";
	$num=$con->query($no);
	$rows=$num->fetch_assoc();
	echo $rows['number'];
	?>
	  </span></i></a></li>
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
    <a href='logo.php'><img src='images/cross.jpg' width='30px'></a>
  </ul>
 
    </p>
	
  </header>

  <!-- Image header -->
 

  <div class="w3-container w3-text-grey" id="jeans">
  <?php
  
     $no="select count(pid) as number from product ";
	$num=$con->query($no);
	$rows=$num->fetch_assoc();
    echo "<p style='color:white'>".$rows['number']." Items</p>";

?>
  </div>

  <!-- Product grid -->
  

  <div class="w3-row-padding w3-padding-16 w3-center" id="food">
  <?php

   if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
     $start_from = ($page-1) * 8; 

  $sel="select * from product ORDER BY pid ASC LIMIT $start_from,8 ";
  
  if(isset($_POST['srch']))
  {
	  $catg=$_POST['catg'];
	  $sub=$_POST['sub'];
	  $sel="select * from product where catg='$catg' and sub='$sub' ORDER BY pid ASC LIMIT $start_from,8 ";
  }
  
  $rel=$con->query($sel);
  if(mysqli_num_rows($rel)==0)
  {
	  echo "<script>alert('No data found')</script>";
  }
  else
  {
	  while($data=mysqli_fetch_array($rel))
		  {
			  echo"
    <div class='w3-quarter' style='height:350px'>
     <a href='product.php?pid=".$data['pid']."'><img src='images/".$data['img']."' style='width:70%';>
      <p>".$data['name']."<br><b>Rs. ".$data['price']."</b></p></a>
    </div>
   ";
		  }
		  
  }

  ?>
   </div>
   <center>
   <div class='page'>
     <?php 
                               $sql = "SELECT COUNT(pid) FROM product"; 
							   
							    if(isset($_POST['srch']))
								  {
									  $catg=$_POST['catg'];
									  $sub=$_POST['sub'];
									  $sql="SELECT COUNT(pid) FROM product where catg='$catg' and sub='$sub'";
								  }
							   
                               $rs_result = $con->query($sql); 
                               $row = mysqli_fetch_row($rs_result); 
                               $total_records = $row[0]; 
                               $total_pages = ceil($total_records /8); 

                               for ($i=1; $i<=$total_pages; $i++) 
							    { 
                                  echo "
		
		                        <a class='page' href='bookgallery.php?page=".$i."'>".$i."</a>
		
		                            "; 
                                }; 

                            ?>
							</div>
							   </center>
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
    <p><input class="w3-input w3-border" type="text" name='uname' placeholder="Enter Username" style="width:40%"></p>
	<p><input class="w3-input w3-border" type="password" name='password' placeholder="Enter Password" style="width:40%"></p>
    <button type="submit" name='login' class="w3-btn w3-padding w3-red w3-margin-bottom">Login</button>
	<br>
	New Customer?<br><br>
	 <a href='reg.php'><button type="button" class="w3-btn w3-padding w3-orange w3-margin-bottom">Register here</button></a>
    </center>
  </div>
  <?php }  ?>
  <!-- Footer -->
  
 
  <!-- End page content -->


<!-- Newsletter Modal -->

 </div>
 <?php
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
               
		           $_SESSION['uid']=$row['uid'];
				   $uid= $_SESSION['uid'];
				   $_SESSION['name']=$row['name'];
				   $uname= $_SESSION['name'];
				   
				   echo "<script>location.replace('bookgallery.php')</script>";
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
<footer class="w3-container w3-theme-d5">
  <p align='right'> <a href="#" target="_blank">Online Book Shopping</a></p>
</footer>