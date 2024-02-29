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

  <center>
    <h1>Update Records</h1>
    <p>You can Update here!</p>
	<?php
	$idd= ! empty($_GET['id']) ? $_GET['id'] : ''; 
	$sel="select * from product where pid='$idd'";
    $rel=$con->query($sel);
    if($data=mysqli_fetch_array($rel))
		  {
			  $nm=$data['name'];
  ?>
	<form method="post">
	<table border='0'>
	<tr><td><label>Product Name</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" value="<?php echo $nm;  ?>" name='name' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	 
	 <tr><td><label>Category</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" value='<?php echo $data['catg'];  ?>' name='catg' placeholder="Category" style="width:100%" required><br/></td></tr>
	
	<tr><td><label>Sub-Category</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" value='<?php echo $data['sub'];  ?>' name='sub' placeholder="Sub Category" style="width:100%" required><br/></td></tr>
	
	 
	<tr><td><label>Price</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" value='<?php echo $data['price'];  ?>' name='price' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	
	<tr><td><label>Description</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" value='<?php echo $data['description'];  ?>' name='desc' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	
	<tr><td><label>Company</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" value='<?php echo $data['author'];  ?>' name='auth' placeholder="Book Name" style="width:100%" required><br/></td></tr>
	
	
	<tr><td colspan="2" align='center'>
	
    <button type="submit" class="w3-btn w3-padding w3-red w3-margin-bottom" name='update'>Update</button>
	
	</td></tr>
	</table></form>
	<?php
		  }
		  ?>
	<br>
	</center>
  </div>
 
 <table class="table table-hover" style='width:90%'>
 <?php
  $sel="select * from product";
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
	   <th>Product Id</th>
        <th>Name</th>
		<th>Category</th>
		<th>Sub Category</th>
        <th>Price</th>
        <th>Description</th>
		<th>Author</th>
	   <th>Action</th>
      </tr>
    </thead>";
	
	while($data=mysqli_fetch_array($rel))
		  { 
	  $uid=$data['pid'];
	  $name=$data['name'];
	  $mob=$data['price'];
	  $email=$data['description'];
	  $add=$data['author'];
	   $catg=$data['catg'];
	    $sub=$data['sub'];
	  
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr>
        <td>".$uid."</td>
        <td>".$name."</td>
		 <td>".$catg."</td>
		  <td>".$sub."</td>
        <td>".$mob."</td>
		<td>".$email."</td>
		<td>".$add."</td>
		<td><a href='EditProd.php?id=$uid'>Edit</a><br/>
		</td>
      </tr>
      
    </tbody>";
		  }
		
		if(!empty($_GET['id']))
		{
			echo "<script>document.getElementById('edit').style.display='block'; </script>";
		}
  }
  
  
  if(isset($_POST['update']))
  {
	  $nm=$_POST['name'];
	  $price=$_POST['price'];
	  $desc=$_POST['desc'];
	  $auth=$_POST['auth'];
	  $idd= $_GET['id'];
	   $catg=$_POST['catg'];
	    $sub=$_POST['sub'];
	  
	  
	  $upd="update product set name='$nm',price='$price',description='$desc',author='$auth',catg='$catg',sub='$sub' where pid='$idd'";
	  if(mysqli_query($con,$upd))
	  {
		  echo "<script>alert('Updated');</script>";
		  echo "<script>window.location.href='EditProd.php';</script>";
	  }
	  else
	  {
		  echo "<script>alert('Updation Failed');</script>";
	  }
  }
  ?>
 </table></center>
 