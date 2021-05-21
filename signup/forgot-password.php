<?php
	if(isset($_GET['lang']))
	{
		$lang = $_GET['lang'];
		if($lang = 'marathi'){
			include('mar/forgot-password.php');
		}
		else if($lang = 'english'){
			include('eng/forgot-password.php');
		}
			else{
			include('eng/forgot-password.php');
			}
	}
	else{
		include('eng/forgot-password.php');
	}

?>
