<?php
include ('../session.php');
include('../database/db.php');


	$check_query = mysqli_query($conn,"SELECT verified from verification where user_id = $user_id");
	$check_row = mysqli_fetch_array($check_query);
	$site = $check_row['verified'];
	if($site == "step4"){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$name = $_POST['name'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			extract($_POST);
			$owner_image = $_FILES['image']['name'];
			if($owner_image!=''){
				
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
			
					$query = "INSERT into owner (biz_id,name,image,mobile,email) VALUES ('$biz_id','$name','$TargetPath','$mobile','$email')";
					
					if (mysqli_query($conn, $query)){
						
									$veri_update = mysqli_query($conn,"UPDATE verification SET verified = 'step6' where user_id = '$user_id'");
									
										header("Location:../step5.php");
								
					}
					else{
						echo "Contact Administrator Technical Problem";
					}
				}
				echo "Contact Administrator Technical Problem";
			
			}
				
		}
		
		}
		
	
	else{
		$site = $check_row['verified'];
		header("Location:../$site.php");
	}

?>
