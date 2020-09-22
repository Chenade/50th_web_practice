<?php

	include('connect.php');
	
	$sql = 'DELETE FROM `user` WHERE `id`="'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	
	header('location:userlist.php');
?>