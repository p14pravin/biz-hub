<?php
	include ('database/db.php');
	
	if(isset($_GET['shop'])){
		$biz_id = $_GET['shop'];
		
		$find = mysqli_query($conn,"SELECT biz_id from business where biz_id = '$biz_id'");
		if($finded = mysqli_fetch_array($find)){
		
			if(isset($_GET['lang'])){
				$lang = $_GET['lang'];
			}
			else{
			$lang_query = mysqli_query($conn,"SELECT lang from reg where id IN (SELECT user_id from business where biz_id = '$biz_id')");
			$lang_row = mysqli_fetch_array($lang_query);
			$lang = $lang_row['lang'];
			}
			
			if($lang == 'marathi'){
				include ('mar/index.php');
			}
			
			if($lang == 'english'){
				include ('eng/index.php');
			}
		}
		else{
		echo "No business found with ID <b>".$biz_id."</b> Please check it.";
	}
		
	}
	else{
		echo "No business found with ID <b>".$biz_id."</b> Please check it.";
	}
	
	
?>

