<?php
	include('connect.php');
	
	
	
	$sql = 'DELETE FROM `'.$_POST['project'].'`  WHERE `id`="'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	//echo $sql;
	header("location:side.php?name=".$_POST['project']."");

?>