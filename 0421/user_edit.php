<?php
	include('connect.php');
	$sql = 'SELECT * FROM `user` WHERE `no` = "'.$_GET['no'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);


?>

<!doctype HTML5>
<html>

<body align="center">
	
	<form action="user_edit2.php" method="post">
	
		<input type="text" name="no" value="<?php echo $row['no'];?>"><br><br>
		名稱：<input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>
		帳號：<input type="text" name="acc" value="<?php echo $row['acc'];?>"><br><br>
		密碼：<input type="text" name="pwd" value="<?php echo $row['pwd'];?>"><br><br>
		
		<?php
		
		if($row['auth'] == 'manager' ){
			echo '權限：<input type="radio" name="auth" value="manager" checked>manager
				<input type="radio" name="auth" value="member">member';
		}else{
			echo '權限：<input type="radio" name="auth" value="manager">manager
				<input type="radio" name="auth" value="member" checked>member';
		}
		
		
		?>
		
		
		<br><br>	
		<input type="submit">
	
	</form>
	
	
	
</body>

</html>