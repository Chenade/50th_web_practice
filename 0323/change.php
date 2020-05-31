<?php

	include('connect.php');
	session_start();
	
	$sql = 'UPDATE `score` SET `score`="'.$_POST['score'].'", `status`="true" WHERE `comment_no.` ="'.$_GET['id'].'" AND `whom` = "'.$_SESSION['acc'].'"';
	mysqli_query($con,$sql);
	
	
	$sql_2 = 'SELECT * FROM `score` WHERE `comment_no.` = "'.$_GET['id'].'"';
	$run_2 = mysqli_query($con,$sql_2);
	echo $sql_2;
	$cal = 0;
	$people = 0;
	
	while($row = mysqli_fetch_assoc($run_2)){
		$cal += $row['score'];
		echo $row['score'];
		
		if ($row['status'] == 'true'){ $people +=1 ;}
	}
	$sql_3 = 'UPDATE `comment` SET `total_score`="'.$cal.'",`total_member`="'.$people.'" WHERE `id` ="'.$_GET['id'].'"';
	mysqli_query($con,$sql_3);
	echo $sql_3;
	header("location:comment.php?project=".$_GET['project']."&id=".$_POST['side']."");

?>