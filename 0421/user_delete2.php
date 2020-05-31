<?php

	include('connect.php');
	
	$sql ='DELETE FROM `user` WHERE `no`="'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	
	header('location:userlist.php');
?>