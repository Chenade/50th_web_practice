<?php

	include('connect.php');
	
	$sql ='UPDATE `user` SET `name`="'.$_POST['name'].'",`acc`="'.$_POST['acc'].'",`pwd`="'.$_POST['pwd'].'",`auth`="'.$_POST['auth'].'" WHERE `no`="'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	
	header('location:userlist.php');
?>