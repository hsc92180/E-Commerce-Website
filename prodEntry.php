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
    <h1>Add New Books</h1>
    <p>New Book Details can be added here!</p>
	<table border='0'><tr><td><label>Book Id</label><br></td>
	 
	 <td><br><p><input class="w3-input w3-border" id='text' type="text" name='pid' value="<?php echo $pid ?>" disabled style="width:100%"></p></td></tr>
	 
	<tr><td><label>Product Name</label><br></td><td><br>
	<input class="w3-input w3-border" id='text' type="text" name='name' placeholder="Product Name" style="width:100%" required><br/></td></tr>
	
	
	<tr><td><label>Product Image</label><br></td>
	<td><br><input type="file" name="image" required><br/></td></tr>
	
	<tr><td><label>Category</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='catg' placeholder="Enter Category" style="width:100%" required><br/></td></tr>
	
	<tr><td><label>Sub-Category</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='sub'  placeholder="Enter Sub Category" style="width:100%" required><br/></td></tr>
	
	<tr><td><label>Price</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='price' pattern="[0-9]*$" title="Enter price in numbers" placeholder="Enter Price" style="width:100%" required><br/></td></tr>
	
	<tr><td><label>Description</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='des' placeholder="Enter Description Here..." style="width:100%"><br/></td></tr>
	
	<tr><td><label>Company</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='aname' placeholder="Enter Company name Here..." style="width:100%"><br/></td></tr>
	
	<tr><td><label>Free</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='free' placeholder="Enter Discount details here..." style="width:100%"><br/></td></tr>
	
	<tr><td><label>Warrranty</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='warranty' placeholder="Enter Warranty details here..." style="width:100%"><br/></td></tr>
	
	<tr><td><label>Delivery</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='delivery' placeholder="Enter Delivery details here..." style="width:100%"><br/></td></tr>
	
	<tr><td><label>Features</label><br></td>
	<td><br><input class="w3-input w3-border" id='text' type="text" name='features' placeholder="Enter Features Here..." style="width:100%"><br/></td></tr>
	
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
	  $file=$_FILES['image']['tmp_name'];
					  $iname=$_FILES['image']['name'];
					  if(isset($iname))
					  {
							 if(!empty($iname))
							{      
							  $location = 'images/';      
							 if(move_uploaded_file($file, $location.$iname))
							 {
									 echo 'uploaded';
							 }
							} 
					  }			
                else
					{
                     echo 'please upload';
                    }
					
					
					$name=$_POST['name'];
					$img=$iname;
					$auth=$_POST['aname'];
					$price=$_POST['price'];
					$desc=$_POST['des'];
					
					$free=$_POST['free'];
					$war=$_POST['warranty'];
					$del=$_POST['delivery'];
					$feat=$_POST['features'];
					$catg=$_POST['catg'];
					$sub=$_POST['sub'];
					
			$sql="Insert into product values('$pid','$name','$img','$price','$desc','$auth','$free','$war','$del','$feat','$catg','$sub')";
			if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Product Details submitted succesfully');</script>";
	  }
	  else
	  {
		  echo "<script>alert('Existing Product Id..Please try again');</script>";
	  }
  }
  ?>
  
  </form>
  </body>
</html>
<br>
<footer class="w3-container w3-theme-d5" style='background-color:
#FA8072;width:100%'>
  <p align='right' style='color:white'> <a href="#" target="_blank">Online Book Shopping</a></p>
</footer>