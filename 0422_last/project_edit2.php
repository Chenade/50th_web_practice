<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	$mem="";$count=0;
	
	while($row= mysqli_fetch_assoc($run)){
		if(@$_POST[$row['name']] == 'on'){
			if($row['name']!=$_POST['leader']){
				$mem .= $row['name'].';';
				$count +=1;
			}
		}
	}
	
	$sql = 'SELECT * FROM `project` WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	//echo $sql;
	
	$sql = 'RENAME TABLE `0422`.`'.$row['name'].'` TO `0422`.`'.$_POST['name'].'`';
	$run = mysqli_query($con,$sql);
	//echo $sql;
	
	$sql = 'UPDATE `project` SET `name`="'.$_POST['name'].'",`detail`="'.$_POST['detail'].'",
			`leader`="'.$_POST['leader'].'",`member`="'.$mem.'",`total_member`="'.$count.'" WHERE `id`="'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	
	
	
	header('location:projectlist.php');


?>