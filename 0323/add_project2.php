<?php
	include('connect.php');
	
	$sql="SELECT * FROM `user`";
	$run = mysqli_query($con,$sql);
	
	$cal = 1;
	$new ="";
	while($row = mysqli_fetch_assoc($run)){
		if ($_POST['leader'] != $row['name'])
		{
			if (@$_POST[$row['name']] == 'on')
			{	
				$new = $new . $row['name'] . ';';
				$cal +=1;
			}	
		}	
	}
	
	
	$sql3 = 'INSERT INTO `project`( `name`, `detail`, `status`,`leader`,`total_member`,`member`) VALUES ("'.$_POST['name'].'","'.$_POST['detail'].'","alive","'.$_POST['leader'].'","'.$cal.'","'.$new.'")';
	$run_3 = mysqli_query($con,$sql3);
	
		
	$sql4 = 'CREATE TABLE `0323`.`'.$_POST['name'].'` ( `id` INT NOT NULL AUTO_INCREMENT , `side` TEXT NOT NULL , `side_detail` TEXT NOT NULL ,`status` TEXT NULL DEFAULT "alive" , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
	$run_4 = mysqli_query($con,$sql4);
	
	
	echo $new;
	echo $cal;
	session_start();
	$_SESSION['project']= $_POST['name'];
	header("location:add_side.php");

?>