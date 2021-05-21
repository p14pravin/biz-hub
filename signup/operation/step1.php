<?php
	include ('../session.php');
	include('../database/db.php');
			
	$check_query = mysqli_query($conn,"SELECT verified from verification where user_id = $user_id");
	$check_row = mysqli_fetch_array($check_query);
	$site = $check_row['verified'];
	if($site == "step1"){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$name		= $_POST['name'];
			$description= $_POST['description'];
			$type		= $_POST['type'];
			$category	= $_POST['category'];
			$day		= $_POST['day'];
			$open_time	= $_POST['open_time'];
			$close_time	= $_POST['close_time'];
		
			$query = "INSERT into business (user_id, biz_name, biz_description, biz_category, biz_type, holiday, open_time, close_time) 
									values ('$user_id','$name','$description','$category','$type','$day','$open_time','$close_time')";
		
			if (mysqli_query($conn, $query)){
				
				
					$query = mysqli_query($conn,"SELECT id from business where user_id = '$user_id'");
					$query_row = mysqli_fetch_array($query);
					$id = $query_row['id'];
					$arr = explode(' ',trim(strtolower($name)));
					$biz_id = "$arr[0]-$id";
					$_SESSION["biz_id"] = $biz_id;
					$update_biz = "UPDATE business SET biz_id = '$biz_id' where user_id ='$user_id' ";
						if(mysqli_query($conn,$update_biz)){
							$veri_update = mysqli_query($conn,"UPDATE verification SET verified = 'step2' where user_id = '$user_id'");
							
								header("Location:../step2.php");
								
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
