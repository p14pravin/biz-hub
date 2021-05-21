<?php

function getCategory($lang,$biz_id){
	require("../database/conn.php");
	
	$cat_query = mysqli_query($conn,"SELECT $lang from category where cat_id IN (SELECT biz_category from business where biz_id = '$biz_id') ");
	$cat_row = mysqli_fetch_array($cat_query);
	echo "\n\n $cat_row[$lang]";
	
	mysqli_close($conn);
}

function getBizType($lang,$biz_id){
	require("database/conn.php");
	
	$type_query = mysqli_query($conn,"SELECT $lang from biz_type where type_id IN (SELECT biz_type from business where biz_id = '$biz_id') ");
	$type_row = mysqli_fetch_array($type_query);
	echo " $type_row[$lang]";
	
	mysqli_close($conn);
}

?>