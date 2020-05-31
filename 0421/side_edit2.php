<?php

	include('connect.php');
	
	$sql ='UPDATE `'.$_POST['project'].'` SET `side_name`="'.$_POST['title'].'",`side_detail`="'.$_POST['detail'].'" WHERE `no` = "'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	
	header('location:side_add.php?project='.$_POST['project'].'');

?>