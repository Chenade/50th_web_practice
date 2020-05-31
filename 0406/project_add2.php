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
	
	
	
	$sql = 'INSERT INTO `project`(`title`, `detail`, `leader`, `member`, `total_mamber`) 
		VALUES ("'.$_POST['title'].'","'.$_POST['detail'].'","'.$_POST['leader'].'","'.$mem.'","'.$count.'")';
	$run = mysqli_query($con,$sql);
	
	$sql ="CREATE TABLE `0406`.`".$_POST['title']."` ( `id` INT NOT NULL AUTO_INCREMENT , `side` TEXT NOT NULL , 
	`side_detail` TEXT NOT NULL , `status` TEXT NOT NULL DEFAULT 'alive' , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	$run = mysqli_query($con,$sql);
	
	header('location:side_add.php?name='.$_POST['title'].'');

?>