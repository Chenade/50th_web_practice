<?php
	
	include('conect.php');
	
	$acc = $_POST['acc'];
	$pwd = $_POST['pwd'];
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_assoc($run)){
		
		if($row['acc'] != $acc){
			$msg = 'wrong account';
		}else{
			if($row['pwd']!= $pwd){
				$msg = 'wrong password';
				break;
			}else{
				if($row['auth'] == 'manager'){
					$msg = 'manager';
					$_SESSION['name'] = $row['name'];
					break;
				}
				else{
					$msg = 'member';
					$_SESSION['name'] = $row['name'];
					break;
				}
			}
		}
	}
	
	if($msg=='wrong account'){
		$_SESSION['msg'] = $msg;
		header('location:index.php');
	}elseif($msg == 'wrong password'){
		$_SESSION['msg'] = $msg;
		header('location:index.php');
	}elseif($msg == 'manager'){
		$_SESSION['msg']='';
		header('location:manager.php');
	}else{
		$_SESSION['msg']='';
		
		header('location:member.php');
	}

?>