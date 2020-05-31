<?php
	include('connect.php');
	
	
	
	$sql = 'UPDATE `'.$_POST['project'].'` SET `side`="'.$_POST['name'].'",`side_detail`="'.$_POST['detail'].'" WHERE `id`="'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	
	header("location:side.php?name=".$_POST['project']."");

?>