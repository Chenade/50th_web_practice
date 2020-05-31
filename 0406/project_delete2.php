<?php

	include('conect.php');
	
	$sql = 'DELETE FROM `project` WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	
	$sql ='DROP TABLE `0406`.`'.$_POST['title'].'`';
	$run = mysqli_query($con,$sql);
	
	header('location:project.php');



?>