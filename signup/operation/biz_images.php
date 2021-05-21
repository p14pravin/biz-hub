<?php
			
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
			include('../database/db.php');
			include ('../session.php');
			
			$img = $_POST['img'];
			extract($_POST);
			$image = $_FILES['image']['name'];
			
			
			$query = mysqli_query($conn,"SELECT biz_id from business where user_id = '$user_id'");
				$row = mysqli_fetch_array($query);
				$biz_id = $row['biz_id'];
			
			if($img=='image1'){
				$name = "$biz_id-1";//imaging
			}
			else if($img=='image2'){
				$name = "$biz_id-2";//imaging
			}
			else if($img=='image3'){
				$name = "$biz_id-3";//imaging
			}
			else if($img=='image4'){
				$name = "$biz_id-4";//imaging
			}
			else if($img=='image5'){
				$name = "$biz_id-5";//imaging
			}
			
			
				$path = dirname(__DIR__, 1);
				$upload_directory = "$path/assets/img/business/myshop/"; //This is the folder which you created just now
				$point=".";
				$info = pathinfo($image);
				$ext = $info['extension']; // get the extension of the file
				$TargetPath=$name.$point.$ext;
				
				
				if(move_uploaded_file($_FILES['image']['tmp_name'], $upload_directory.$TargetPath)){
			
					$query = "UPDATE gallery SET $img = '$TargetPath' where biz_id = '$biz_id'";
					
					if (mysqli_query($conn, $query)){

										header("Location:../profile.php");
								
					}
					else{
						echo "Contact Administrator Technical Problem";
					}
				}
			header("Location:../profile.php");
			
				
		}
?>
