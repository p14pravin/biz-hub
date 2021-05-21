<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			include('../database/db.php');
			include ('../session.php');
			
			extract($_POST);
			$name = $_POST['name'];
			$biz_image = $_FILES['image']['name'];
			$mobile =$_POST['mobile'];
			$email = $_POST['email'];
			
			if($biz_image!=''){
				$query = mysqli_query($conn,"SELECT biz_id from business where user_id = '$user_id'");
				$row = mysqli_fetch_array($query);
				$biz_id = $row['biz_id'];
				$arr = explode(' ',trim(strtolower($name)));
				$image_name = "$arr[0]-$biz_id";//imaging
				
				$path = dirname(__DIR__, 1);
				$upload_directory = "$path/assets/img/business/owner/"; //This is the folder which you created just now
				$info = pathinfo($_FILES['image']['name']);
				$ext = $info['extension']; // get the extension of the file
				$point=".";
				$TargetPath=$image_name.$point.$ext;
				if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory.$TargetPath)){
			
					$query = "UPDATE owner SET name = '$name', image = '$TargetPath', mobile = $mobile , email = '$email' where biz_id = '$biz_id'";
					
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
