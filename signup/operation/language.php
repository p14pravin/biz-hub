<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		include('../database/db.php');
		include ('../session.php');
		
		$language = $_POST['language'];
		
		$lang_query = "UPDATE reg SET lang = '$language' where id = $user_id";
		if(mysqli_query($conn,$lang_query)){
		$_SESSION['language'] = $language;
		header("Location:../profile.php");
		}
	}
?>
