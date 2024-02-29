<?php
include('connect.php');
 $ArraY=array();
$sql = "SELECT * from rating ";
 $rel=$con->query($sql);
while ($row = mysqli_fetch_array($rel)) {
   
   $userID = $row['uname']; #users

$bookID = $row['book']; #bookd

$rating = $row['rate'];

$ArraY[$userID][$bookID] = $rating;
     
 
      }


?>