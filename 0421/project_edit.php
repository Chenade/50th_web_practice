<?php
	
	include('connect.php');
	
	$sql = 'SELECT * FROM `project` WHERE `no` = '.$_GET['no'].'';
	$run = mysqli_query($con,$sql);
	$row1 = mysqli_fetch_assoc($run);
?>

<!doctype HTML5>
<html>

<body align="center">
	
	<form action="project_edit2.php" method="post">
	
		<input type="hidden" name="no" value="<?php echo $row1['no'];?>"><br><br>
		標題：<input type="text" name="title" value="<?php echo $row1['title'];?>"><br><br>
		說明：<input type="text" name="detail" value="<?php echo $row1['detail'];?>"><br><br>
		
		<?php
			
			
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				if($row1['leader'] == $row['name']){
					echo '<input type="radio" name="leader" value="'.$row['name'].'" checked>'.$row['name'];
				}else{
					echo '<input type="radio" name="leader" value="'.$row['name'].'">'.$row['name'];
				}
				
			}
		?>
		
		<br><br>
		
		
		<hr>
		
		<?php
			
			echo '組員名單：'.$row1['member'].'<br><br>';
			echo '修改組員名單';
			
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				echo '<input type="checkbox" name="'.$row['name'].'">'.$row['name'];
			}
		?>
		
		<br><br>
		
	
		<input type="submit">
	
	</form>
	
	
	
</body>

</html>