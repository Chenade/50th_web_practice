<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_assoc($run)){
		if($_POST['acc']!=$row['acc']){
			$msg = 'wrong acc';
		}else{
			if($_POST['pwd']!=$row['pwd']){
				$msg = 'wrong pwd';
				break;
			}else{
				if($row['auth'] == 'manager'){
					$msg = 'manager';
					$_SESSION['acc'] = $row['name'];
					break;
				}else{
					$msg = 'member';
					$_SESSION['acc'] = $row['name'];
					break;
				}
			}
		}
	}
	
	if ($msg == 'wrong acc'){
		$_SESSION['msg'] = $msg;
		header('location:index.php');
	}elseif ($msg == 'wrong pwd'){
		$_SESSION['msg'] = $msg;
		header('location:index.php');
	}elseif ($msg == 'manager'){
		$_SESSION['msg'] = '';
		
		header('location:manager.php');
	}elseif ($msg == 'member'){
		$_SESSION['msg'] = '';
		
		header('location:member.php');
	}else{
		echo 'error';
	}


?>