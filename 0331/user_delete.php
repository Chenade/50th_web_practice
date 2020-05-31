<?php
	include('connect.php');

	$sql = 'SELECT * FROM `user` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
?>

<!doctype HTML5>

<head></head>

<body align="center">

	<form action="user_delete2.php" method="post">
		
		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
		名稱：<input type="text" name="name" value="<?php echo $row['name'];?>"><br>
		帳號：<input type="text" name="acc" value="<?php echo $row['acc'];?>"><br>
		密碼：<input type="text" name="pwd" value="<?php echo $row['pwd'];?>"><br>
		
		<?php
		
		if($row['auth']=='manager'){
			
			echo '權限：<input type="radio" name="auth" value="manager" checked="true">管理員
			<input type="radio" name="auth" value="member">一般使用者<br><br>';
		
		}else{
			
			echo '權限：<input type="radio" name="auth" value="manager">管理員
			<input type="radio" name="auth" value="member" checked="true">一般使用者<br><br>';
			
		}
		
		?>
		
		
		
		<input type="submit">
		
	</form>

	<br><button onclick=location.href='userlist.php'>BACK</button><br><br>
</body>