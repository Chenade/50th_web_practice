<?php
	include('connect.php');
	session_start();
	$count = 'SELECT * FROM `project` WHERE `name` = "'.$_POST['project'].'"';
	$run_count = mysqli_query($con,$count);
	$row = mysqli_fetch_assoc($run_count);
	
	
	$sql='INSERT INTO `comment`(`project`, `side`, `title`, `content`, `whom` ,`total_score`, `total_member`,`refer`) VALUES ("'.$_POST['project'].'","'.$_POST['id'].'","'.$_POST['title'].'","'.$_POST['detail'].'","'.$_SESSION['acc'].'","'.$row['total_member'].'","0","'.$_POST['refer'].'")';
	$run = mysqli_query($con,$sql);
	
	
	$sql_2 ='SELECT * FROM `user`';
	$run_2 = mysqli_query($con,$sql_2);
	
	$sql3 ='SELECT * FROM `comment`';
	$run3 = mysqli_query($con,$sql3);
	$num = mysqli_num_rows($run3)+1;
	while($_row=mysqli_fetch_assoc($run_2)){
		$sql_a = 'INSERT INTO `score`(`project`, `side`, `comment_no.`, `score`, `whom`) VALUES ("'.$_POST['project'].'","'.$_POST['id'].'","'.$num.'","1","'.$_row['name'].'")';
		$run_a = mysqli_query($con,$sql_a);
		echo $sql_a . "<br>";
	}
	
	
	echo $sql;
	header("location:comment.php?project=".$_POST['project']."&id=".$_POST['id']."");
?>