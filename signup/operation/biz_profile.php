<?php


		if($_SERVER['REQUEST_METHOD']=='POST'){
			include('../database/db.php');
			include ('../session.php');
			extract($_POST);
			$biz_image = $_FILES['biz_image']['name'];
			if($biz_image!=''){
				
				$query = mysqli_query($conn,"SELECT biz_id from business where user_id = '$user_id'");
				$row = mysqli_fetch_array($query);
				$biz_id = $row['biz_id'];
				
				$path = dirname(__DIR__, 1);
				$upload_directory = "$path/assets/img/business/profile/"; //This is the folder which you created just now
				$info = pathinfo($_FILES['biz_image']['name']);
				$ext = $info['extension']; // get the extension of the file
				$point=".";
				$TargetPath=$biz_id.$point.$ext;
				if(move_uploaded_file($_FILES['biz_image']['tmp_name'], $upload_directory.$TargetPath)){
			
					$query = "UPDATE business SET biz_image = '$TargetPath' where user_id = '$user_id'";
					
					if (mysqli_query($conn, $query)){

										header("Location:../profile.php");
								
					}
					else{
						echo "Contact Administrator Technical Problem";
					}
				}
			
			}
				
		}
?>
