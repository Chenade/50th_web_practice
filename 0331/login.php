<?php 

	include('connect.php');
	
	$acc = $_POST['acc'];
	$pwd = $_POST['pwd'];

	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_assoc($run)){
		
		if($acc != $row['acc']){
			$msg = 'wrong account';
		}else{
			if($pwd != $row['pwd']){
				$msg = 'wrong password';
				break;
			}else{
				if($row['auth'] != 'manager'){
					$msg = 'member';
					break;
				}else{
					$msg = 'manager';
					break;
				}
			}
			
		}
	
	}
	
	if ($msg == 'manager'){
		$_SESSION['msg'] = '';
		$_SESSION['auth'] = 'manager';
		header('location:manager.php');
	}elseif($msg == 'member'){
		$_SESSION['msg'] = '';
		$_SESSION['auth'] = 'member';
		header('location:member.php');
	}else{
		$_SESSION['msg'] = $msg;
		header('location:index.php');
	}
?>