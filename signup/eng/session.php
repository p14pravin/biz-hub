<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
	if(isset($_SESSION["user"])){
	   $user_id = $_SESSION['user'];
		$language = $_SESSION['language'];
		//$biz_id = $_SESSION['biz_id'];
	}
	else{
		
      header("location:login.php");
      die();
   }
?>