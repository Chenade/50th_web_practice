<?php

	include('connect.php');
	
	$sql ='DELETE FROM `project` WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	
	
	header('location:projectlist.php');

?>