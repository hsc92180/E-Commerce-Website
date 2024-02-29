<select name="sub">
	<option>Select Sub Category</option>
	<?php 
	include('connect.php');
	$catg=$_GET['catg'];
	$sel="select distinct sub from product where catg='$catg'";
	$rel=$con->query($sel);

 while($data=mysqli_fetch_array($rel))
 {
	echo "<option>".$data['sub']."</option>";
 }
	
	?>
	</select>
	<br/><br/>