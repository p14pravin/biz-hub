<?php


		if($_SERVER['REQUEST_METHOD']=='POST'){
			include ('../session.php');
			include('../database/db.php');
			$name		= $_POST['name'];
			$description= $_POST['description'];
			$type		= $_POST['type'];
			$category	= $_POST['category'];
			$day		= $_POST['day'];
			$open_time	= $_POST['open_time'];
			$close_time	= $_POST['close_time'];
		
			$query = "UPDATE business SET biz_name = '$name', biz_description = '$description', biz_category = $category, biz_type = '$type', holiday = '$day', open_time = '$open_time', close_time = '$close_time' where user_id = '$user_id'";
				
		
			if (mysqli_query($conn, $query)){
				
				header("Location:../profile.php");
						
				}
				else{
					echo "Contact Administrator Technical Problem";
				}
				
			}
?>
