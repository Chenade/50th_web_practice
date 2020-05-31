<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	$num = mysqli_num_rows($run);
	
	
	
	$member = "";
	$count = 1;
	while($row = mysqli_fetch_assoc($run)){
		if(@$_POST[$row['name']] == 'on'){
			if($_POST['leader'] == $row['name']){
				
			}else{
				$member .= $row['name'] . ";";
				$count +=1 ;
			}
			
		}	
	}
	
	$sql = 'INSERT INTO `project`(`name`, `detail`, `leader`, `member`, `total_member`) 
		VALUES ("'.$_POST['name'].'","'.$_POST['detail'].'","'.$_POST['leader'].'","'.$member.'","'.$count.'")'; 
	$run = mysqli_query($con,$sql);
	
	
	$sql = 'CREATE TABLE `0331`.`'.$_POST['name'].'` ( `id` INT NOT NULL AUTO_INCREMENT , `name` TEXT NOT NULL , `detail` TEXT NOT NULL , `status` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
	$run = mysqli_query($con,$sql);
	
	header('location:projectlist.php');

?>