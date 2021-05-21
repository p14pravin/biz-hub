<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['language']);
  
header("Location:login.php");
?>