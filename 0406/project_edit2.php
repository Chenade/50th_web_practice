<?php

	include('conect.php');
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	$mem = '';$count =1;
	
	while($row = mysqli_fetch_assoc($run)){
		
		if(@$_POST[$row['name']] == 'on'){
			if ($row['name'] != $_POST['leader']){
				$mem .= $row['name'].';';
				$count += 1;
			}
		}		
	}
	
	$sql = 'SELECT * FROM `project` WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	
	//$sql ="ALTER TABLE '".$row['title']."' RENAME TO '".$_POST['title']."'";
	$sql ="RENAME TABLE ".$row['title']." TO ".$_POST['title']."";
	$run = mysqli_query($con,$sql);
	echo $sql;
	$sql = 'UPDATE `project` SET `title`="'.$_POST['title'].'",`detail`="'.$_POST['detail'].'",`leader`="'.$_POST['leader'].'",
	`member`= "'.$mem.'",`total_mamber`="'.$count.'" WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	
	
	
	header('location:project.php');

?>