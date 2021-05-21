<?php
include ('../session.php');
include('../database/db.php');

	$check_query = mysqli_query($conn,"SELECT verified from verification where user_id = $user_id");
	$check_row = mysqli_fetch_array($check_query);
	$site = $check_row['verified'];
	if($site == "step3"){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$street		= $_POST['street'];
			$village	= $_POST['village'];
			$state		= $_POST['state'];
			$district	= $_POST['district'];
			$pin		= $_POST['pin'];
			
			$query = mysqli_query($conn,"SELECT biz_id from business where user_id = '$user_id'");
				$row = mysqli_fetch_array($query);
				$biz_id = $row['biz_id'];
		
			$query = "INSERT into address (biz_id, street, village, state, district, pin) 
									values ('$biz_id','$street','$village','$state','$district','$pin')";
		
			if (mysqli_query($conn, $query)){
				
				$veri_update = mysqli_query($conn,"UPDATE verification SET verified = 'step4' where user_id = '$user_id'");
			
				header("Location:../step4.php");
								
						
						
				}
				echo "Contact Administrator Technical Problem";
			}
		
		}
		
	
	else{
		$site = $check_row['verified'];
		header("Location:../$site.php");
	}

?>
