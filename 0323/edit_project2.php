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
	
	$sql = 'UPDATE `project` SET `name`="'.$_POST['name'].'",`detail`="'.$_POST['detail'].'",`leader`="'.$_POST['leader'].'",`total_member`="'.$cal.'",`member`="'.$new.'" WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	echo $sql;
	echo $new;
	echo $cal;
	
	header("location:project.php");

?>