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
	
	$sql = 'UPDATE `project` SET `name`="'.$_POST['name'].'",`detail`="'.$_POST['detail'].'",`leader`="'.$_POST['leader'].'",`member`="'.$member.'",`total_member`="'.$count.'" WHERE `id` = "'.$_POST['id'].'"';
	$run = mysqli_query($con,$sql);
	//echo $sql;
	header('location:projectlist.php');

?>