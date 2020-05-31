<?php

	include('connect.php');
	
	
	
	$sql = 'DELETE FROM `project` WHERE `no` = "'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	
	
	//echo $sql;
	header('location:projectlist.php');
?>