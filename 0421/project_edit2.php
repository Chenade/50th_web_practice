<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	
	$mem = '';
	$count = 1;
	while($row = mysqli_fetch_assoc($run)){
		if(@$_POST[$row['name']] == 'on'){
			if($row['name'] != $_POST['leader']){
				$mem .= $row['name'].';';
				$count +=1;
			}
		}
	}
	
	$sql = 'SELECT * FROM `project` WHERE `no` = "'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	
	$sql = 'RENAME TABLE `0421`.`'.$row['title'].'` TO `0421`.`' . $_POST['title'].'`';
	$run = mysqli_query($con,$sql);
	echo $sql;
	
	$sql = 'UPDATE `project` SET `title`="'.$_POST['title'].'",`detail`="'.$_POST['detail'].'",`leader`="'.$_POST['leader'].'",`member`="'.$mem.'",`total_member`="'.$count.'",`total_score`="'.$count.'" WHERE `no` = "'.$_POST['no'].'"';
	$run = mysqli_query($con,$sql);
	echo $sql;
	
	//echo $sql;
	header('location:projectlist.php');
?>