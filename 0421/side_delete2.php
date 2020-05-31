<?php

	include('connect.php');
	
	$sql ='DELETE FROM `'.$_POST['project'].'`  WHERE `no` = "'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	
	header('location:side_add.php?project='.$_POST['project'].'');

?>