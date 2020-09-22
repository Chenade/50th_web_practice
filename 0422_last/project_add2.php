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
	
	$sql = 'INSERT INTO `project`(`name`, `detail`, `leader`, `member`, `total_member`) 
			VALUES ("'.$_POST['name'].'","'.$_POST['detail'].'","'.$_POST['leader'].'","'.$mem.'","'.$count.'")';
	$run = mysqli_query($con,$sql);
	
	$sql = 'CREATE TABLE `0422`.`'.$_POST['name'].'` ( `id` INT NOT NULL AUTO_INCREMENT , `side_name` TEXT NOT NULL , `side_detail` TEXT NOT NULL , `status` TEXT NOT NULL DEFAULT "alive" , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
	$run = mysqli_query($con,$sql);
	
	header('location:side_add.php?project='.$_POST['name'].'');


?>