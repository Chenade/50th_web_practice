<?php

	include('connect.php');
	$comments = "";
	for ($i = 1; $i <11; $i+=1){
		
		$now = 'side_'.$i;
		if(@$_POST[$now]){$comments .= '_'.@$_POST[$now];}
		
		
	}
	
	$sql = 'INSERT INTO `exe`(`project`, `name`, `exe_detail`, `comments`) VALUES ("'.$_POST['project'].'","'.$_POST['name'].'","'.$_POST['exe_detail'].'","'.$comments.'")';
	$run = mysqli_query($con,$sql);
	
	header('location:exelist.php?project='.$_POST['project'].'');
	//echo $comments;
?>