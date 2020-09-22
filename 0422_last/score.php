<?php
	
	include('connect.php');
	
	$sql = 'SELECT * FROM `comment` WHERE `id`="'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	//echo $sql;
	
	$sql2 = 'SELECT * FROM `score` WHERE `project`="'.$_POST['project'].'" AND `side`="'.$_POST['side'].'"  AND `whom`="'.$_SESSION['acc'].'"';
	$run2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_assoc($run2);
	
	$count = $row['total_score'] - $row2['score'] + $_POST['score'];
	//echo  $row2['score'] ;

	
	
	
	$sql ='UPDATE `score` SET `score`="'.$_POST['score'].'",`states`="true" WHERE `comment_no`="'.$_POST['id'].'" AND `side`="'.$_POST['side'].'" AND `whom`="'.$_SESSION['acc'].'"';
	$run = mysqli_query($con,$sql);
	echo $sql;
	
	$sql ='UPDATE `comment` SET `total_score`="'.$count.'" WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	echo $count;
	
	header('location:comment.php?project='.$_POST['project'].'&side='.$_POST['side']);
	
?>

