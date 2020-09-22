


<html>

<body align="center">

	<form action="user_edit2.php" method ="post">
		
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>"><br><br>
		名稱：<input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>
		帳號：<input type="text" name="acc" value="<?php echo $row['acc'];?>"><br><br>
		密碼：<input type="text" name="pwd" value="<?php echo $row['pwd'];?>"><br><br>
		
		<?php
			
			if ($row['auth'] == 'manager'){
				echo '權限：<input type="radio" name="auth" value="manager" checked>管理員
					<input type="radio" name="auth" value="member">一般會員<br><br>';
			}else{
				echo '權限：<input type="radio" name="auth" value="manager" >管理員
					<input type="radio" name="auth" value="member" checked>一般會員<br><br>';
			}
		
		?>
		
			
		<input type="submit"><br><br>
	</form>
	
	
	
</body>
</html>