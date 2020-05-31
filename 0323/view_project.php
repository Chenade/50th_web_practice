<?php
	include('connect.php');
	session_start();
	//$_SESSION['project'] = 'all';
	
	
	$sql2 = "SELECT * FROM `".$_GET['name']."`";
	$run_2 = mysqli_query($con,$sql2);
	$num = mysqli_num_rows($run_2);
	
?>


<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1><?php echo $_GET['name'];?></h1>
		
			
			<button onclick=location.href="member.php">BACK</button><br><br>	
			<?php
				
				if ($_GET['auth'] == "leader"){
					echo '<button onclick=location.href="exelist.php?project='.$_GET['name'].'">查看執行方案</button><br><br>	';
				}else{
					echo '<button onclick=location.href="exelist_member.php?project='.$_GET['name'].'">查看執行方案</button><br><br>	';
				}
			
			?>
			<hr>
		
			<?php
			
			
			while ($row = mysqli_fetch_assoc($run_2)){
				
				if ($_GET['auth']=='leader'){
					$_SESSION['leader']="true";
				}else{
					$_SESSION['leader']="false";
				}
				echo '<button onclick=location.href="comment.php?project='.$_GET['name'].'&id='.$row['id'].'" style="width:80vw; margin:20px;">';
			
				echo '<h3>面相名稱'.$row['side'].'</h3><br>';
				echo '<p>面相說明'.$row['side_detail'].'</p>';
				
			
				
				echo '</button><br>';
				
			}
			
			
			?>
			
		
		
		
	</div>
	
	
	
</body>