<?php
	include('connect.php');
	session_start();
	
	$sql = 'UPDATE `'.$_GET['project'].'` SET `status`= "'.$_POST['control'].'" WHERE `id` = "'.$_GET['side'].'" ';
	$run = mysqli_query($con,$sql);
	//echo $sql;
	header('location:comment.php?project='.$_GET['project'].'&id='.$_GET['side'].'');

?>