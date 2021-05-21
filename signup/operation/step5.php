<?php
include ('../session.php');
include('../database/db.php');


	$check_query = mysqli_query($conn,"SELECT verified from verification where user_id = $user_id");
	$check_row = mysqli_fetch_array($check_query);
	$site = $check_row['verified'];
	if($site == "step5"){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
			extract($_POST);
			$image1 = $_FILES['image1']['name'];
			$image2 = $_FILES['image2']['name'];
			$image3 = $_FILES['image3']['name'];

			if($image1!=''){
				
				$query = mysqli_query($conn,"SELECT biz_id from business where user_id = '$user_id'");
				$row = mysqli_fetch_array($query);
				$biz_id = $row['biz_id'];
				
				$path = dirname(__DIR__, 1);
				$upload_directory = "$path/assets/img/business/myshop/"; //This is the folder which you created just now
				$point=".";
				
				//image 1
				$name1 = "$biz_id-1";//imaging
				$info = pathinfo($_FILES['image1']['name']);
				$ext = $info['extension']; // get the extension of the file
				$TargetPath1=$name1.$point.$ext;
					move_uploaded_file($_FILES['image1']['tmp_name'], $upload_directory.$TargetPath1);
				
				//image 2
				$name2 = "$biz_id-2";//imaging
				$info = pathinfo($_FILES['image2']['name']);
				$ext = $info['extension']; // get the extension of the file
				$TargetPath2=$name2.$point.$ext;
					move_uploaded_file($_FILES['image2']['tmp_name'], $upload_directory.$TargetPath2);
				
				//image 3
				$name3 = "$biz_id-3";//imaging
				$info = pathinfo($_FILES['image3']['name']);
				$ext = $info['extension']; // get the extension of the file
				$TargetPath3=$name3.$point.$ext;
					move_uploaded_file($_FILES['image3']['tmp_name'], $upload_directory.$TargetPath3);
				
				//image 4
				
				$TargetPath4="NULL";
					
					
				//image 5
				
				$TargetPath5="NULL";
					
				
				
				$query = "INSERT into gallery (biz_id,image1,image2,image3,image4,image5) VALUES ('$biz_id','$TargetPath1','$TargetPath2','$TargetPath3','$TargetPath4','$TargetPath5')";
				
				if (mysqli_query($conn, $query)){
					
								$veri_update = mysqli_query($conn,"UPDATE verification SET verified = 'index' where user_id = '$user_id'");
								
									header("Location:../index.php");
							
				}
				else{
					echo "Contact Administrator Technical Problem";
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
