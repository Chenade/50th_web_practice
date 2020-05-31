<?php
	include('connect.php');

	$sql= 'UPDATE `user` SET `name`="'.$_POST['name'].'",`account`="'.$_POST['acc'].'",`password`="'.$_POST['pwd'].'",`authority`="'.$_POST['auth'].'" WHERE `id`="'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	//echo $sql;
	
	header("location:user.php");
?>