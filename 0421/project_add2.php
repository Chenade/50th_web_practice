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
	
	$sql = 'INSERT INTO `project`( `title`, `detail`, `leader`, `member`, `total_member`, `total_score`) VALUES ("'.$_POST['title'].'","'.$_POST['detail'].'","'.$_POST['leader'].'","'.$mem.'","'.$count.'","'.$count.'")';
	$run = mysqli_query($con,$sql);
	
	$sql = 'CREATE TABLE `0421`.`'.$_POST['title'].'` ( `no` INT NOT NULL AUTO_INCREMENT , `side_name` TEXT NOT NULL , `side_detail` TEXT NOT NULL , `states` TEXT NOT NULL DEFAULT "alive" , PRIMARY KEY (`no`)) ENGINE = InnoDB;';
	$run = mysqli_query($con,$sql);
	//echo $sql;
	header('location:side_add.php?project='.$_POST['title'].'');
?>