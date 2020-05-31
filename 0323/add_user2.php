<?php

	include('connect.php');
	
	$sql = "INSERT INTO `user` (`name`, `account`, `password`, `project`, `authority`) VALUES ('".$_POST['name']."', '".$_POST['acc']."', '".$_POST['pwd']."', '', '".$_POST['auth']."');";
	$run = mysqli_query($con,$sql);
	
	header("location:user.php");

?>