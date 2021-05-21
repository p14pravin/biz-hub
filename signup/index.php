<?php
	include ('session.php');
	include('database/db.php');
			
	$query = mysqli_query($conn,"SELECT lang from reg where lang = '$language'");
	$row = mysqli_fetch_array($query);
	
	if($row['lang']=='marathi')
	{
		include('mar/index.php');
	}
	else
	{
		include('eng/index.php');
	}
?>
