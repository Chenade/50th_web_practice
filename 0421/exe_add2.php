<?php
	
	include('connect.php');
	
	$sql = 'SELECT * FROM `'.$_POST['project'].'`';
	$run = mysqli_query($con,$sql);
	$com = '';
	while($row = mysqli_fetch_assoc($run)){
		$com .= @$_POST[$row['side_name']].';';
		//echo $_POST[$row['side_name']];
	}
	
	
	
	$sql = 'INSERT INTO `exe`( `project`, `exe_name`, `exe_detail`, `comment`, `whom`) 
			VALUES ("'.$_POST['project'].'","'.$_POST['name'].'","'.$_POST['detail'].'","'.$com.'","'.$_SESSION['acc'].'")';
	$run = mysqli_query($con,$sql);
	echo $sql;
	header('location:exe_add.php?project='.$_POST['project'].'');
?>