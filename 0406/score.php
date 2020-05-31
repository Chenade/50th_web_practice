<?php

	include('conect.php');
	
	$sql = 'UPDATE `score` SET `score`="'.$_POST['score'].'",`states`="true" WHERE `comment_no` = "'.$_POST['no'].'" AND `whom`="'.$_SESSION['name'].'"';
	echo $sql;
	$run = mysqli_query($con,$sql);
	
	$sql = 'SELECT * FROM `score` WHERE `comment_no` = "'.$_POST['no'].'"  ';
	$run = mysqli_query($con,$sql);
	$add = 0;
	$people=0;
	
	while($row = mysqli_fetch_assoc($run)){
		$add += $row['score'];
		if($row['states'] == 'true'){
			$people+=1;
		}
	}
	
	$sql ='UPDATE `comment` SET `score`="'.$add.'",`people`="'.$people.'" WHERE `id` = "'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	
	//echo $sql;
	header('location:comment.php?project='.$_GET['project'].'&side='.$_GET['side']);
?>