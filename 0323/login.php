<?php 
	include('connect.php');
	session_start();
	
	$acc = $_POST['acc'];
	$pwd = $_POST['pwd'];
	
	$sql="SELECT * FROM `user`";
	$run = mysqli_query($con,$sql);
	
	
	
	while($row = mysqli_fetch_assoc($run)){
		
		if ($row['account'] != $acc){
			
			$msg = 'wrong account';
			//header('location:index.php');
			
			
		}else{
			
			if ($row['password'] != $pwd){
				
				$msg= 'wrong password';
				//header('location:index.php');
				
			}else{
				$msg = '';
				if ($row['authority'] == 'manager'){
					$_SESSION['acc'] = $acc;
					$msg= 'manager';
					break;
					///header('location:manager.php');
				}else{
					$_SESSION['acc'] = $row['name'];
					$msg= 'member';
					break;
					//header('location:member.php');
				}
			}
		}		
		
	}
	
	
	Switch ($msg)
	{
		case "manager":header('location:manager.php');break;
		case "member":header('location:member.php');break;
		default:header('location:index.php');break;
	}
	echo $msg;
	$_SESSION['msg'] = $msg;;
	
?>
