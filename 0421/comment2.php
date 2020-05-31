<?php

	include('connect.php');
	
	$sql = 'UPDATE `123456` SET `states`="'.$_POST['comment'].'" WHERE `side_name` = "'.$_GET['side'].'"';
	$run = mysqli_query($con,$sql);
	echo $sql;
	header('location:comment.php?project='.$_GET['project'].'&side='.$_GET['side'].'');

?>