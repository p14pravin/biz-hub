<?php


		if($_SERVER['REQUEST_METHOD']=='POST'){
			include ('../session.php');
			include('../database/db.php');
			
			$street		= $_POST['street'];
			$village	= $_POST['village'];
			$state		= $_POST['state'];
			$district	= $_POST['district'];
			$pin		= $_POST['pin'];
			
			$query_address = "UPDATE address SET street = '$street', village = '$village', state='$state', district='$district', pin ='$pin' where biz_id IN (SELECT biz_id from business where user_id = '$user_id')";
		
			if (mysqli_query($conn, $query_address)){
				header("Location:../profile.php");		
			}
				echo "Contact Administrator Technical Problem";
		}
?>