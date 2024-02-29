<?php
session_start();
session_destroy();
unset($_SESSION['uid']);
echo "<script>alert(\"Logout Successfully\")</script>";
echo "<script>window.location.href='home.php';</script>";
?>