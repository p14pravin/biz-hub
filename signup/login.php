<?php
	if(isset($_GET['lang']))
	{
		$lang = $_GET['lang'];
		if($lang = 'marathi'){
			include('mar/login.php');
		}
		else if($lang = 'english'){
			include('eng/login.php');
		}
			else{
			include('eng/login.php');
			}
	}
	else{
		include('eng/login.php');
	}

?>
